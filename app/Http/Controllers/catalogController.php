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

    public function newCatalog(Request $request)
    {
        \DB::table('catalog')->insert([
            'name'          => $request->name,
            'basePrice'     => $request->basePrice,
            'remark'        => $request->remark,
            'isActive'      => $request->isActive
        ]);

        $data['data'] = \DB::table('catalog')
            ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')
            ->get();

        return $data;
    }

    public function viewCatalog($itemId)
    {
        $catalog = \DB::table('catalog')
            ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')
            ->where('itemId', '=', $itemId)
            ->get();
        
        $data['data'] = $catalog[0];

        return view('catalogRecord', $data);
    }

    public function updateCatalog(Request $request){
        \DB::table('catalog')
        ->where('itemId', $request->itemId)
        ->update(
            array(
                'itemId'        => $request->itemId,
                'name'          => $request->name,
                'basePrice'     => $request->basePrice,
                'isActive'      => $request->isActive,
                'remark'        => $request->remark
            )
        );

        $data['status'] = 'success';

        return $data;
    }

    public function retrievePrice(Request $request){
        $catalog = \DB::table('catalog')
        ->select('name', 'basePrice', 'remark', 'isActive', 'itemId')
        ->where('itemId', '=', $request->catalogId)
        ->get();
        $data['status'] = 'SUCCESS';
        $data['catalog'] = $catalog[0];

        return $data;
    }
}
