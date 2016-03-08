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

class VoucherHeadController extends Controller
{
    protected function isGetRequest()
    {
        return Input::server("REQUEST_METHOD") == "GET";
    }

   public function index(){

       $pageTitle = 'Journal Voucher Informations';
       $model = new VoucherHead();
       $model = $model->with('relBranch')->where('account_type','journal-voucher')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);

       $type = 'journal-voucher';
       $generate_number = GenerateNumber::generate_number($type);

       $generate_voucher_number = $generate_number[0];
       $settings_id = $generate_number[1];
       $number = $generate_number[2];

       $currency_data = Currency::lists('title','id')->all();
       $branch_data =  Branch::lists('title','id')->all();

       return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'currency_data'=>$currency_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id]);
   }

    public function search_voucher(){

        $pageTitle = 'Journal Voucher Informations';
        $model = new VoucherHead();

        if($this->isGetRequest()){

            $type = 'journal-voucher';
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
            $model = $model->where('account_type','journal-voucher')->paginate(30);
        }else{
            $model = $model->with('relBranch')->where('status','!=','cancel')->orderBy('id', 'DESC')->paginate(30);
        }
        $currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
        $branch_data =  [''=>'Select Branch'] + Branch::lists('title','id')->all();
        return view('accounts::voucher_head.index',['pageTitle'=>$pageTitle,'branch_data'=>$branch_data,'model'=>$model,'generate_voucher_number'=>$generate_voucher_number,'number'=>$number,'settings_id'=>$settings_id,'currency_data'=>$currency_data]);
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
            'note'=>$input['note']
        ];

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
        $pageTitle = 'View Journal Voucher Informations';
        $data = VoucherHead::with('relBranch')->where('id',$id)->first();
        $voucher_details_data = VoucherHistory::where('voucher_head_id',$id)->orderBy('voucher_head_id', 'DESC')->get();
        //$voucher_details_data = VoucherDetail::with('relVoucherHead','relChartOfAccounts','relCurrency')->where('voucher_head_id',$id)->where('status','!=','cancel')->orderBy('id', 'DESC')->get();

        return view('accounts::voucher_head.view', ['data' => $data,'voucher_details_data' => $voucher_details_data, 'pageTitle'=> $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Journal Voucher Informations';
        $branch_data = Branch::lists('title','id');
        $currency_data = [''=>'Select Currency'] + Currency::lists('title','id')->all();
        /*$model = new VoucherHead();
        $year = $model->getYear();*/

        $data = VoucherHead::with('relVoucherDetail')->where('id', $id)->get();

        return view('accounts::voucher_head.update', ['data' => $data,'branch_data'=>$branch_data,'currency_data'=>$currency_data,'pageTitle'=> $pageTitle]);
    }

    public function update(VoucherHeadRequest $request, $id)
    {
        $input = $request->all();


        // input data for voucher head
        $input_head =[
                'id'=>@$input['id'],
                'account_type'=>@$input['account_type'],
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
            //print_r($i_detail);exit;
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
                            //'voucher_head_id'=>$vh['id'],
                            //'voucher_number'=> $vh['voucher_number'],
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
            LogFileHelperAcc::log_info('change-status-voucher-head', 'Successfully change status', ['Voucher head id : '.$model->id]);
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', $e->getMessage());
            LogFileHelperAcc::log_error('change-status-voucher-head', $e->getMessage(), ['Voucher head id : '.$model->id]);
        }
        return redirect()->route('voucher-head');
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
                LogFileHelperAcc::log_info('delete-voucher-head', 'Successfully change status to cancel', ['Voucher head id : '.$model->id]);
            }
            catch (Exception $ex){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger',$ex->getMessage());
                LogFileHelperAcc::log_error('delete-voucher-head', $ex->getMessage(), ['Voucher head id : '.$model->id]);
            }
        }else{
            Session::flash('message', "Voucher Details Data Found ! You Can Not Delete This Voucher Number");
        }
        return redirect()->back();
    }


    public function journal_voucher_history($id)
    {
        $pageTitle = "Journal Voucher History";
        $data = VoucherHistory::where('voucher_head_id',$id)->orderBy('voucher_head_id', 'DESC')->get();

        return view('accounts::voucher_head.journal_voucher_history', ['data' => $data, 'pageTitle'=> $pageTitle]);
    }
}