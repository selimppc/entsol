<?php

namespace App\Modules\Accounts\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Jaspersoft\Client\Client;
use App\Branch;
use DB;
use Session;
use Input;
use Illuminate\Support\Facades\Response;


class AcReportsController extends Controller
{

    #private $report_path = '/entsol/gsg_reports';
    private $report_path = '/entsol/sns_reports';
    #private $report_path = '/entsol/Reports';

    private function connection(){
        /*$c = new Client(
            "http://37.230.100.79:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );*/

        $c = new Client(
            "http://localhost:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        return $c;
    }

    public function test_report(){
        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        //TODO:: Get report in HTML
        $report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'html');
        echo $report;
        exit();


        //TODO:: Get report in PDF
        /*$report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'pdf');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=report.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;*/


        //TODO:: Get report in Excel
        /*$report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'xls');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=report.xls');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/xls');
        echo $report;*/



        //TODO:: reports with Input Control
        /*$controls = array(
            'Country_multi_select' => array('USA', 'Mexico'),
            'Cascading_state_multi_select' => array('CA', 'OR')
        );
        $report = $c->reportService()->runReport('/reports/samples/Cascading_multi_select_report', 'html', null, null, $controls);
        echo $report;*/


    }


    public function account_reports(){
        $branch_id = [''=>'Select Branch'] + Branch::lists('title','title')->all();
        return view('accounts::reports.reports_dashboard', ['branch_id'=> $branch_id]);
    }

    public function trial_balance(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $from_date = date('Y-m-d', strtotime($data['pFromDate']));
        $to_date = date('Y-m-d', strtotime($data['pToDate']));

        $controls = array(
            'pBranch' => $data['pBranch'],
            'pFromDate' => $from_date,
            'pToDate' => $to_date
        );

        //print_r($controls);exit;

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_trial_balance', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=trial_balance_'.$from_date.'_'.$to_date.'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_trial_balance', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=trial_balance_'.$from_date.'_'.$to_date.'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }
    }


    public function trial_balance_all(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $from_date = date('Y-m-d', strtotime($data['pFromDate']));
        $to_date = date('Y-m-d', strtotime($data['pToDate']));

        $controls = array(
            'pBranch' => $data['pBranch'],
            'pFromDate' => $from_date,
            'pToDate' => $to_date
        );

        //print_r($controls);exit;

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_trialblall', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=trial_balance_all_'.$from_date.'_'.$to_date.'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_trialblall', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=trial_balance_all_'.$from_date.'_'.$to_date.'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }
    }


    public function gl_transaction_report(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $from_date = date('Y-m-d', strtotime($data['pFromDate']));
        $to_date = date('Y-m-d', strtotime($data['pToDate']));

        $controls = array(
            'pTrn' => $data['pTrn'],
            'pBranch' => $data['pBranch'],
            'pStatus' => $data['pStatus'],
            'pFromDate' => $from_date,
            'pToDate' => $to_date
        );

        //print_r($controls);exit;

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_transaction', 'pdf', null, null, $controls);

            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=gl_transaction_'.$from_date.'_'.$to_date.'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_transaction', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=gl_transaction_'.$from_date.'_'.$to_date.'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }
    }

    public function gl_single_voucher(Request $requests){

        $c = $this->connection();

        $data = $requests->all();
        $controls = array(
            'pVoucherNo' => $data['pVoucherNo']
        );

        if(@$data['PDF']=='PDF Report'){
            try {
                $report = $c->reportService()->runReport($this->report_path.'/ac_gl_singlvoucher', 'pdf', null, null, $controls);
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename=single_voucher_'.$data['pVoucherNo'].'.pdf');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . strlen($report));
                header('Content-Type: application/pdf');
                echo $report;
            } catch (\Exception $e) {
                Session::flash('danger', $e->getMessage());
                return redirect()->back();
            }

        }else if(@$data['Excel']=='Excel Report'){
            try {
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_singlvoucher', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=single_voucher_'.$data['pVoucherNo'].'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
            } catch (\Exception $e) {
                Session::flash('danger', $e->getMessage());
                return redirect()->back();
            }
        }
    }

    public function gl_pnl_sheet(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $controls = array(
            'pYear' => $data['pYear'],
            'pPeriod' => $data['pPeriod'],
            'pBranch' => $data['pBranch'],
            'pStyle' => $data['pStyle']
        );

        //print_r($controls);exit;/

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_pnlsheet', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=pnlsheet_'.$data['pYear'].'_'.$data['pPeriod'].'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_pnlsheet', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=pnlsheet_'.$data['pYear'].'_'.$data['pPeriod'].'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }
    }

    public function chart_of_accounts_report(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $controls = array(
            'pType' => $data['pType']
        );

        //print_r($controls);exit;/

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_chart_of_ac', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=chart_of_accounts.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_chart_of_ac', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=chart_of_accounts.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }
    }


    public function balance_sheet(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $controls = array(
            'pYear' => $data['pYear'],
            'pPeriod' => $data['pPeriod'],
            'pBranch' => $data['pBranch'],
            'pStyle' => $data['pStyle']
        );

        //print_r($controls);exit;/

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_balance_sheet', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=balance_sheet_'.$data['pYear'].'_'.$data['pPeriod'].'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_balance_sheet', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=balance_sheet_'.$data['pYear'].'_'.$data['pPeriod'].'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }

    }

    public function ledger_balance_ac(Request $requests){

        $c = $this->connection();

        $data = $requests->all();

        $from_date = date('Y-m-d', strtotime($data['pFromDate']));
        $to_date = date('Y-m-d', strtotime($data['pToDate']));

        $controls = array(
            'pAccountTitle' => $data['pAccountCode'],
            'pBranch' => $data['pBranch'],
            'pFromDate' => $from_date,
            'pToDate' => $to_date
        );


        //print_r($controls);exit;

        if(@$data['PDF']=='PDF Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_account_report', 'pdf', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=ledger_balance_ac_'.$data['pAccountCode'].'.pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/pdf');
            echo $report;
        }else if(@$data['Excel']=='Excel Report'){
            $report = $c->reportService()->runReport($this->report_path.'/ac_gl_account_report', 'xls', null, null, $controls);
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=ledger_balance_ac_'.$data['pAccountCode'].'.xls');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($report));
            header('Content-Type: application/xls');
            echo $report;
        }

    }


    public function pdf_single_voucher($voucher_number){

        $c = $this->connection();

        $controls = array(
            'pVoucherNo'=>$voucher_number
        );

        $report = $c->reportService()->runReport($this->report_path.'/ac_gl_singlvoucher', 'pdf', null, null, $controls);

        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=single_voucher_'.$voucher_number.'.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;

    }

    public function xls_single_voucher($voucher_number){

        $c = $this->connection();

        $controls = array(
            'pVoucherNo'=>$voucher_number
        );

        $report = $c->reportService()->runReport($this->report_path.'/ac_gl_singlvoucher', 'xls', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=single_voucher_'.$voucher_number.'.xls');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/xls');
        echo $report;


    }


    public function get_autocomplete_search_coa(){

        $coa_data = Input::get('term');

        $coa = DB::table('ac_chart_of_accounts')
            ->where('title', 'LIKE', '%' . $coa_data . '%')
            ->orWhere('account_code', 'LIKE', '%' . $coa_data . '%')
            ->select(DB::raw('CONCAT(ac_chart_of_accounts.account_code, ":", " ",ac_chart_of_accounts.title) AS title, ac_chart_of_accounts.title as coa_title'))
            ->get();
        #print_r($coa);exit;

        foreach($coa as $v){
            $data[] = array('value'=>$v->title,
                'coa_title' => $v->coa_title);
        }
        return Response::json($data);
    }

}
