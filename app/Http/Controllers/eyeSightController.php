<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class eyeSightController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function newEyeSight($clientId)
	{
        $clientData = \DB::table('client')
			->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'birthDate', 'customerlevel.levelName')
			->leftjoin('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
			->where('clientId', '=', $clientId)
			->limit(1)
			->get();

		$data['data'] =  $clientData[0];

		return view('newEyeSight', $data);
	}
}
