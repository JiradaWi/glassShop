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
		// ->join('category','product.CatId', '=', 'category.CatId')
		->select('clientId', 'firstName', 'lastName', 'contactNo', 'currentLevel')
		// ->orderBy('name')
		->get();

		// $data['cat'] = \DB::table('category')->get();
		
    	return view('index', $data);
    }
}
