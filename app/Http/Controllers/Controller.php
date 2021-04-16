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

		$data['level'] = \DB::table('customerlevel')
			->select('levelId', 'levelName')
			->get();

		return view('index', $data);
	}

	public function searchCustomer(Request $Request)
	{
		$searchKeyword = $Request->keyword;
		if ($searchKeyword != '') {
			$searchKeyword = $searchKeyword . '%';
			$data['data'] = \DB::table('client')
				->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
				->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
				->where('firstName', 'like', $searchKeyword)
				->orWhere('lastName', 'like', $searchKeyword)
				->orWhere('contactNo', 'like', $searchKeyword)
				->get();

			return $data;
		} else {
			$data['data'] = \DB::table('client')
				->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
				->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
				->get();

			return $data;
		}
	}

	public function newClient(Request $Request)
	{
		\DB::table('client')->insert([
			'firstName'		=> $Request->firstName,
			'lastName'		=> $Request->lastName,
			'birthDate'		=> $Request->birthDate,
			'contactNo'		=> $Request->contactNo,
			'currentLevel'	=> $Request->customerLevel
		]);
		$data['data'] = \DB::table('client')
			->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
			->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
			->get();

		return 	$data;
	}

	public function viewClient($clientId)
	{
		$clientData = \DB::table('client')
			->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'birthDate', 'customerlevel.levelName')
			->join('customerlevel', 'client.currentLevel', '=', 'customerlevel.levelId')
			->where('clientId', '=', $clientId)
			->limit(1)
			->get();

		$data['data'] =  $clientData[0];

		$data['level'] = \DB::table('customerlevel')
			->select('levelId', 'levelName')
			->get();
		//	$data['clientId'] = $clientId;
		return view('clientRecord', $data);
	}

	public function updateClient(Request $request)
	{
		\DB::table('client')
			->where('clientId', $request->clientId)
			->update(
				array(
					'firstName'		=> $request->firstName,
					'lastName'		=> $request->lastName,
					'birthDate'		=> $request->birthDate,
					'contactNo'		=> $request->contactNo,
					'currentLevel'	=> $request->customerLevel
				)
			);

		$data['status'] = 'success';
		return $data;
	}
}
