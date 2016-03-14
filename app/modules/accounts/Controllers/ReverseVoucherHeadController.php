<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 12:32 PM
 */

namespace App\Modules\Accounts\Controllers;

use App\Branch;
use App\ChartOfAccounts;
use App\Currency;
use App\Helpers\LogFileHelperAcc;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherHeadRequest;
use App\Settings;
use App\VoucherHead;
use App\VoucherDetail;
use App\Modules\Accounts\Helpers\GenerateNumber;
use App\VoucherHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ReverseVoucherHeadController extends Controller
{
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }

   public function index(){

       $pageTitle = 'Reverse Entry Informations';
       $model = new VoucherHead();
       $model = $model->with('relBranch')->where('account_type','reverse-entry')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);

       $type = 'reverse-entry';
       $generate_number = GenerateNumber::generate_number($type);

       $generate_voucher_number = $generate_number[0];
       $settings_id = $generate_number[1];
       $number = $generate_number[2];
       /*$currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
       $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();*/
       $currency_data = Currency::lists('title','id')->all();
       $branch_data =  Branch::lists('title','id')->all();

       return view('accounts::reverse_entry.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id,'currency_data'=>$currency_data]);
   }

    public function search_reverse_entry(){

        $pageTitle = 'Reverse Entry Informations';
        $model = new VoucherHead();

        if($this->isGetRequest()){

            $type = 'reverse-voucher';
            $generate_number = GenerateNumber::generate_number($type);

            $generate_voucher_number = $generate_number[0];
            $settings_id = $generate_number[1];
            $number = $generate_number[2];

            $branch_id = Input::get('branch_id');
            $voucher_number = Input::get('voucher_number');
            $year = Input::get('year');
            $period = Input::get('period');
            $date = Input::get('date');
            $status = Input::get('status');

            $model = $model->with('relBranch');
            if (isset($branch_id) && !empty($branch_id)) $model->where('ac_voucher_head.branch_id', '=', $branch_id);
            if (isset($year) && !empty($year)) $model->where('ac_voucher_head.year', '=', $year);
            if (isset($period) && !empty($period)) $model->where('ac_voucher_head.period', '=', $period);
            if (isset($voucher_number) && !empty($voucher_number)) $model->where('ac_voucher_head.voucher_number', 'LIKE', '%'.$voucher_number.'%');
            if (isset($date) && !empty($date)) $model->where('ac_voucher_head.date', '=', $date);
            if (isset($status) && !empty($status)) $model->where('ac_voucher_head.status', '=', $status);
            $model = $model->where('account_type','reverse-entry')->paginate(30);
        }else{
            $model = $model->with('relBranch')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);
        }

        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        $currency_data = Currency::lists('title','id')->all();

        return view('accounts::reverse_entry.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'currency_data'=>$currency_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id]);
    }

    public function store(VoucherHeadRequest $request){
        $input = $request->all();
        $settings_id = $input['settings_id'];
        $number = $input['number'];

        // input data for voucher head
        $input_head =[
            'account_type'=>$input['account_type'],
            'voucher_number'=>$input['voucher_number'],
            'date'=>$input['date'],
            'reference'=>$input['reference'],
            'year'=>$input['year'],
            'period'=>$input['period'],
            'branch_id'=>$input['hd_branch_id'],
            'note'=>$input['note'],
            'status'=> 'active',
        ];
        #print_r($input_head);exit;

        // input data for voucher detail
        for($i=0; $i<count($input['coa_id']); $i++){
            $i_detail[] = array(
                'ac_title'=>$input['ac_title'][$i],
                'coa_id'=>$input['coa_id'][$i],
                'currency_id'=>$input['currency_id'][$i],
                'branch_id'=>$input['branch_id'][$i],
                'debit'=>$input['debit'][$i],
                'credit'=>$input['credit'][$i],
            );
        }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            //insert into voucher head table
            $vh = VoucherHead::create($input_head);

            // Store data into voucher detail
            foreach($i_detail as $value){

                $prime_amount = $value['debit'] ? $value['debit'] : -($value['credit']);

                if($prime_amount!=0 || $prime_amount!=null){

                    $chart_of_ac = ChartOfAccounts::findOrFail($value['coa_id']);
                    $account_code = $chart_of_ac->account_code;
                    $currency =Currency::findOrFail($value['currency_id']);
                    $exchange_rate= $currency->exchange_rate;
                    $base_amount = $prime_amount * $exchange_rate;

                    //detail data
                    $data = [
                        'voucher_head_id'=>$vh['id'],
                        'voucher_number'=> $vh['voucher_number'],
                        'coa_id'=> $value['coa_id'],
                        'account_code'=> $account_code,
                        //'sub_account_code'=> $value['sub_account_code'],
                        'currency_id'=> $value['currency_id'],
                        'exchange_rate'=> $exchange_rate,
                        'prime_amount'=> $prime_amount,
                        'base_amount'=> $base_amount,
                        'branch_id'=> $value['branch_id'],
                        'status'=> 'active',
                    ];
                    // insert data into voucher detail table
                    VoucherDetail::create($data);
                }
            }
            //Update Settings for voucher number
            Settings::where('id', $settings_id)->update(array('last_number' => $number));

            //Commit the transaction
            DB::commit();
            Session::flash('message', 'Successfully added!');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $pageTitle = 'View Reverse Entry Informations';
        $data = VoucherHead::with('relBranch')->where('id',$id)->first();
        /*$voucher_details_data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();*/
        $voucher_details_data = VoucherHistory::where('voucher_head_id',$id)->orderBy('voucher_head_id', 'DESC')->get();
        return view('accounts::reverse_entry.view', ['data' => $data,'voucher_details_data' => $voucher_details_data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Reverse Entry Informations';

        $branch_data = Branch::lists('title','id');
        /*$model = new VoucherHead();
        $year = $model->getYear();*/
        $currency_data = Currency::lists('title','id')->all();

        $data = VoucherHead::with('relVoucherDetail')->where('id', $id)->get();
        $status = VoucherHead::where('id',$id)->first();

        return view('accounts::reverse_entry.update', ['data' => $data,'branch_data'=>$branch_data,'pageTitle'=> $pageTitle,'currency_data'=>$currency_data,'status'=>$status]);
    }

    public function update(VoucherHeadRequest $request, $id)
    {
        $input = $request->all();
        #print_r($input);exit;
        // input data for voucher head
        $input_head =[
            'id'=>@$input['id'],
            'account_type'=>@$input['account_type'],
            'voucher_number'=>$input['voucher_number'],
            'date'=>@$input['date'],
            'reference'=>@$input['reference'],
            'year'=>@$input['year'],
            'period'=>@$input['period'],
            'branch_id'=>@$input['hd_branch_id'],
            'note'=>@$input['note']
        ];

        // input data for voucher detail
        for($i=0; $i<count($input['coa_id']); $i++){
            $i_detail[] = array(
                'dt_id'=>@$input['dt_id'][$i],
                'ac_title'=>@$input['ac_title'][$i],
                'coa_id'=>@$input['coa_id'][$i],
                'currency_id'=>@$input['currency_id'][$i],
                'branch_id'=>@$input['branch_id'][$i],
                'debit'=>@$input['debit'][$i],
                'credit'=>@$input['credit'][$i],
            );
        }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            //insert into voucher head table
            $vh_model = VoucherHead::findOrNew($input['id']);
            $vh = $vh_model->update($input_head);
            //print_r($vh_model);exit;
            // Store data into voucher detail
            foreach($i_detail as $value){
                $dt_model = $value['dt_id'] ? VoucherDetail::findOrNew($value['dt_id']) : new VoucherDetail();
                $prime_amount = $value['debit'] ? $value['debit'] : -($value['credit']);

                if($prime_amount!=0 || $prime_amount!=null){

                    $chart_of_ac = ChartOfAccounts::findOrFail($value['coa_id']);
                    $account_code = $chart_of_ac->account_code;
                    $currency =Currency::findOrFail($value['currency_id']);
                    $exchange_rate= $currency->exchange_rate;
                    $base_amount = $prime_amount * $exchange_rate;

                    //detail data
                    $data = [
                        'voucher_head_id'=>$vh_model['id'],
                        'voucher_number'=> $vh_model['voucher_number'],
                        'coa_id'=> $value['coa_id'],
                        'account_code'=> $account_code,
                        'currency_id'=> $value['currency_id'],
                        'exchange_rate'=> $exchange_rate,
                        'prime_amount'=> $prime_amount,
                        'base_amount'=> $base_amount,
                        'branch_id'=> $value['branch_id'],
                        'status'=> 'active',
                    ];


                    // insert data into voucher detail table
                    if($value['dt_id']){
                        $dt_model->update($data);
                    }else{
                        $dt_model->create($data);
                    }
                }
            }

            //Commit the transaction
            DB::commit();
            Session::flash('message', 'Successfully added!');

        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());

        }

        return redirect()->back();
    }
    public function change_status($id)
    {
        $model = VoucherHead::findOrFail($id);

        DB::beginTransaction();
        try {
            if($model->status =='active'){
                $model->status = 'inactive';
            }else{
                $model->status = 'active';
            }
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Changed Status.");
            LogFileHelperAcc::log_info('change-status-reverse-voucher-head', 'Successfully change status', ['Reverse Voucher head id :'. $model->id]);
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', $e->getMessage());
            LogFileHelperAcc::log_error('change-status-reverse-voucher-head', $e->getMessage(), ['Reverse Voucher head id :'. $model->id]);
        }
        return redirect()->route('reverse-voucher');
    }

    public function delete($id){

        $model = VoucherHead::findOrFail($id);
        $voucher_details_data = VoucherDetail::where('voucher_head_id',$id)->first();

        if($voucher_details_data == "")
        {
            DB::beginTransaction();
            try {
                $model->status = 'cancel';
                $model->save();
                DB::commit();
                Session::flash('message', "Successfully Deleted.");
                LogFileHelperAcc::log_info('delete-reverse-voucher-head', 'Successfully change status to cancel', ['Reverse Voucher head id :'. $model->id]);
            }
            catch (Exception $ex){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger',$ex->getMessage());
                LogFileHelperAcc::log_error('delete-reverse-voucher-head', $ex->getMessage(), ['Reverse Voucher head id :'. $model->id]);
            }
        }else{
            Session::flash('message', "Voucher Details Data Found ! You Can Not Delete This Voucher Number");
        }
        return redirect()->back();
    }


    public function reverse_voucher_history($id)
    {
        $pageTitle = "Reverse Voucher History";
        $data = VoucherHistory::where('voucher_head_id',$id)->orderBy('voucher_head_id', 'DESC')->get();

        return view('accounts::reverse_entry.reverse_voucher_history', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
}