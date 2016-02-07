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
            "entsol"
        );

        // Store service for several calls
        $js = $c->jobService();
        $js->getJobs("/entsol/Reports/chart_of_account_list");

        // Or access service methods directly
        $c->jobService()->getJobs("/entsol/Reports/chart_of_account_list");


        $info = $c->serverInfo();

        print_r($info);

    }
}
