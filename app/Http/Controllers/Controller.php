<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse;

    public function __construct()
    {
    	list($msec, $sec) = explode(' ', microtime());
        $seq = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        config(['request_seq' => $seq]);
        $params = [
            'seq'  => $seq,
            'url'  => \Request::getRequestUri(),
            'get'  => $_GET,
            'post' => $_POST,
       ];
    }
}
