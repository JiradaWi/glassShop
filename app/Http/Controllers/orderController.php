<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class orderController extends BaseController
{
    public function newOrder($clientId)
    {
        $clientData = \DB::table('client')
            ->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'birthDate', 'customerlevel.levelName')
            ->leftjoin('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
            ->where('clientId', '=', $clientId)
            ->limit(1)
            ->get();

        $data['data'] =  $clientData[0];

        $data['status'] = \DB::table('orderstatus')
            ->select('orderStatusId', 'statusName')
            ->orderby('orderStatusId')
            ->get();

        return view('newOrder', $data);
    }
}
