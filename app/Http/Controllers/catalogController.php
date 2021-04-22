<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catalogController extends Controller
{
    public function index()
    {
        $data['data'] = \DB::table('catalog')
            ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')
            ->get();

        return view('catalog', $data);
    }

    public function searchCatalog(Request $Request)
    {
        $searchKeyword = $Request->keyword;
        if ($searchKeyword != '') {
            $searchKeyword = $searchKeyword . '%';
            $data['data'] = \DB::table('catalog')
                ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')                
                ->where('name', 'like', $searchKeyword)              
                ->get();

            return $data;
        } else {
            $data['data'] = \DB::table('catalog')
                ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')                  
                ->get();

            return $data;
        }
    }
}
