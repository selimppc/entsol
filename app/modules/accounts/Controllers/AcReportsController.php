<?php

namespace App\Modules\Accounts\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Jaspersoft\Client\Client;

class AcReportsController extends Controller
{
    public function test_report(){
        $c = new Client(
            "http://localhost:8080/jasperserver",
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







    
}
