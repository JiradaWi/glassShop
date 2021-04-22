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

    public function saveOrder(Request $request){
        \DB::table('shoporder')->insert([
			'clientId'		=> $request->clientId,
			'orderDate'		=> $request->orderDate,
			'status'		=> $request->status,
			'remark'		=> $request->remark
		]);
       // $url = '/client/'.$request->clientId;

        return redirect()->route('clientRecord', $request->clientId);
    }

    public function viewOrder($orderId){
        $order = \DB::table('shoporder')
        ->select('orderId', 'client.clientId', 'firstName', 'lastName', 'statusName', 'totalPrice', 'paymentMethod', 'shoporder.remark', 'orderDate', 'orderFinishDate', 'shoporder.status')
        ->leftjoin('client', 'client.clientId', '=', 'shoporder.clientId')
        ->leftjoin('orderstatus', 'orderstatus.orderStatusId', '=', 'shoporder.status')
        ->where('orderId', '=', $orderId)
        ->limit(1)
        ->get();

        $response['orderDetail'] = $order[0];

        $response['statusName'] = \DB::table('orderStatus')
        ->select('statusName', 'orderStatusId')
        ->get();
        return view('orderRecord', $response);
    }

    public function updateOrder(Request $request){
        \DB::table('shoporder')
        ->where('orderId', $request->orderId)
        ->update(
            array(
                'orderDate'         => $request->orderDate,
                'orderFinishDate'   => $request->orderFinishDate,
                'paymentMethod'     => $request->paymentMethod,
                'status'            => $request->status,
                'remark'            => $request->remark
            )
        );

        $data['status'] = 'SUCCESS';
		return $data;
    }
}
