<?php

namespace App\Modules\Accounts\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function trial_balance(){

        $c = new Client(
            "http://192.168.2.182:8080/jasperserver",
            "jasperadmin",
            "jasperadmin",
            ""
        );

        $pBranch = Input::get('pBranch');
        $pFromDate = Input::get('pFromDate');
        $pToDate = Input::get('pToDate');

        $report = $c->reportService()->runReport('/reports/samples/AllAccounts', 'html');
        echo $report;
        exit();


    }


    public function trial_balance_all(){

    }


    public function gl_transaction(){

    }

    public function gl_single_voucher(){

    }

    public function gl_pnl_sheet(){

    }

    public function chart_of_accounts_report(){

    }


    public function balance_sheet(){

    }





}
