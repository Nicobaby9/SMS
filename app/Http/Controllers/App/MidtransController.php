<?php

namespace App\Http\Controllers\App;

use GuzzleHttp\Exception\RequestException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Order;
use App\Model\User;
use Str;
use Midtrans;

class MidtransController extends Controller
{

    public function create() {
        
        Midtrans\Config::$serverKey = config('app.midtrans.server_key');
        Midtrans\Config::$isSanitized = true;
        Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('midtrans.payment', compact('snapToken'));

    }

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

        // $snapToken = Midtrans\Snap::getSnapToken($body);
    	$res = $client->post('/v2/charge', [
    		'headers' => $headers,
    		'body' => json_encode($body)
    	]);

    	return json_decode($res->getBody());
    }

    public function generate(Request $request) {
    	
    	$midtrans_transaction = Midtrans\Snap::createTransaction($request->data);

    	return response()->json([
    		'response_code' => '00',
    		'response_msg' => 'success',
    		'data' => $midtrans_transaction
    	]);
    }

    public function checkout(Request $request) {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            )
        );
    }
}
