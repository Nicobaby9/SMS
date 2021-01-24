<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Order;
use App\Model\User;
use {Str, Midtrans};

class MidtransController extends Controller
{
    public function store(Request $request) {

    	$order = Order::create([
    		'amount' => $request->amount,
    		'method' => $request->method,
    	]);

    	$order->order_id = Str::random(4).'-'.$order->id.'-'.Str::random(5).'-'.time();
    	$order->save();

    	$response_midtrans = $this->midtrans_store($order);
    	
    	return response()->json([
    		'response_code' => '00',
    		'response_msg' => 'success',
    		'data' => $response_midtrans,
    	]);
    }

    public function midtrans_store(Order $order) {
    	$server_key = base64_encode(config('app.midtrans.server_key'));
    	$base_uri = config('app.midtrans.base_uri');
    	$client = new Client([
    		'base_uri' => $base_uri,
    	]);

    	$headers = [
    		'Accept' => 'application/json',
    		'Authorization' => 'Basic ' . $server_key,
    		'Content-Type' => 'application/json'
    	];

    	$user = User::findOrFail(8);

    	// dd($user);

    	switch ($order->method) {
    		case 'bca': 
    			$body = [
    				'payment_type' => 'bank_transfer',
    				'transaction_details' => [
    					"gross_amount" => $order->amount,
    					"order_id" => $order->order_id
    				],
    				'customer_details' => [
    					"email" => $user->email,
    					"name" => $user->fullname,
    					"username" => $user->username,
    					"phone" => $user->phone
    				],
    				'bank_transfer' => [
    					"bank" => "bca"
    				]
    			];
    			break;
    		case 'bri': 
    			$body = [
    				'payment_type' => 'bank_transfer',
    				'transaction_details' => [
    					"gross_amount" => $order->amount,
    					"order_id" => $order->order_id
    				],
    				'customer_details' => [
    					"email" => $user->email,
    					"name" => $user->fullname,
    					"username" => $user->username,
    					"phone" => $user->phone
    				],
    				'bank_transfer' => [
    					"bank" => "bri"
    				]
    			];
    			break;
    		case 'bni': 
    			$body = [
    				'payment_type' => 'bank_transfer',
    				'transaction_details' => [
    					"gross_amount" => $order->amount,
    					"order_id" => $order->order_id
    				],
    				'customer_details' => [
    					"email" => $user->email,
    					"name" => $user->fullname,
    					"username" => $user->username,
    					"phone" => $user->phone
    				],
    				'bank_transfer' => [
    					"bank" => "bni"
    				]
    			];
    			break;
    		default: 
    			$body = [];
    			break;
    	}

    	$res = $client->post('/v2/charge', [
    		'headers' => $headers,
    		'body' => json_encode($body)
    	]);

    	return json_decode($res->getBody());
    }

    public function generate(Request $request) {
    	Midtrans\Config::$serverKey = config('app.midtrans.server_key');
    	Midtrans\Config::$isSanitized = true;
    	Midtrans\Config::$is3ds = true;

    	$snapToken = Midtrans\Snap::getSnapToken($request->data);
    	$midtrans_transaction = Midtrans\Snap::createTransaction($request->data);

    	return response()->json([
    		'response_code' => '00',
    		'response_msg' => 'success',
    		'data' => $midtrans_transaction
    	]);
    }
}
