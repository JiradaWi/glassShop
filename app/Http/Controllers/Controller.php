<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function index()
	{
		$data['data'] = \DB::table('client')
			->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
			->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
			->get();

		return view('index', $data);
	}

	public function searchCustomer(Request $Request)
	{
		$searchKeyword = $Request->keyword;
		if ($searchKeyword!='') {
			$searchKeyword = $searchKeyword . '%';
			$data['data'] = \DB::table('client')
				->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
				->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
				->where('firstName', 'like', $searchKeyword)
				->orWhere('lastName', 'like', $searchKeyword)
				->orWhere('contactNo', 'like', $searchKeyword)
				->get();

			return $data;
		}else{
			$data['data'] = \DB::table('client')
			->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
			->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
			->get();
			
			return $data;
		}
	}
}
