<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $data['data'] = \DB::table('client')
		->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel', 'customerlevel.levelName')
		->join('customerlevel', 'client.clientId', '=', 'customerlevel.levelId')		
		->get();

		// $data['cat'] = \DB::table('category')->get();
		
    	return view('index', $data);
    }
}
