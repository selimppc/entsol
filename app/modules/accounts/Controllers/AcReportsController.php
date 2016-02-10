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

class AcReportsController extends Controller
{
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
        $branch_id = [''=>'Select Branch'] + Branch::lists('title','id')->all();
        return view('accounts::reports.reports_dashboard', ['branch_id'=> $branch_id]);
    }

    public function trial_balance(Request $requests){


        $data = $requests->all();

        $controls = array(
            'pDate' => $data['custom_date'],
            'Cascading_state_multi_select' => array('CA', 'OR')
        );

        if(@$data['[PDF]']=='PDF Report'){
            echo "PDF";
        }else if(@$data['[Excel]']=='Excel Report'){
            echo "Excel";
        }

        print_r("----");
        exit("OK");

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pBranch = Input::get('pBranch');
        $pFromDate = Input::get('pFromDate');
        $pToDate = Input::get('pToDate');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_trial_balance', 'html');
        echo $report;
        exit();


    }


    public function trial_balance_all(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pBranch = Input::get('pBranch');
        $pFromDate = Input::get('pFromDate');
        $pToDate = Input::get('pToDate');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_gl_trialblall', 'html');
        echo $report;
        exit();

    }


    public function gl_transaction(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pTrn = Input::get('pTrn');
        $pBranch = Input::get('pBranch');
        $pFromDate = Input::get('pFromDate');
        $pToDate = Input::get('pToDate');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_gl_transaction', 'html');
        echo $report;
        exit();

    }

    public function gl_single_voucher(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pVoucherNo = Input::get('pVoucherNo');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_gl_singlvoucher', 'html');
        echo $report;
        exit();

    }

    public function gl_pnl_sheet(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pYear = Input::get('pYear');
        $pPeriod = Input::get('pPeriod');
        $pBranch = Input::get('pBranch');
        $pStyle = Input::get('pStyle');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_gl_pnlsheet', 'html');
        echo $report;
        exit();

    }

    public function chart_of_accounts_report(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pType = Input::get('pType');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_chart_of_ac', 'html');
        echo $report;
        exit();
    }


    public function balance_sheet(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pYear = Input::get('pYear');
        $pPeriod = Input::get('pPeriod');
        $pBranch = Input::get('pBranch');
        $pStyle = Input::get('pStyle');

        $report = $c->reportService()->runReport('/entsol/Reports/ac_balance_sheet', 'html');
        echo $report;
        exit();

    }





}
