<?php

namespace App\Modules\Accounts\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JasperPHP\JasperPHP as JasperPHP;

class AcReportsController extends Controller
{

    public function test_report(){
        $jasper = new JasperPHP;

        // Compile a JRXML to Jasper
       $data = $jasper->compile('app/modules/accounts/Reports/ac_chart_of_ac.jrxml')->execute();

        print_r($data);exit("OK");

        // Process a Jasper file to PDF and RTF (you can use directly the .jrxml)
        $jasper->process('app/modules/accounts/Reports/ac_chart_of_ac.jrxml',
            false,
            array("pdf", "rtf"),
            array("php_version" => "xxx")
        )->execute();

        // List the parameters from a Jasper file.
        $array = $jasper->list_parameters('app/modules/accounts/Reports/ac_chart_of_ac.jrxml'
        )->execute();


        print_r($array);exit();

        return view('welcome');
    }
}
