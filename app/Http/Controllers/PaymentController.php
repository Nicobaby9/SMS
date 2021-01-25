<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\CoreApi;

class PaymentController extends Controller
{
    public function __construct()
    {
        //
    }

    public function bankTransferCharge(Request $req)
    {
        try {
        	
        	$transaction = array(
                "payment_type" => "bank_transfer",
                "transaction_details" => [
                    "gross_amount" => 10000,
                    "order_id" => date('Y-m-dHis')
                ],
                "customer_details" => [
                    "email" => "budi.utomo@Midtrans.com",
                    "first_name" => "Azhar",
                    "last_name" => "Ogi",
                    "phone" => "+628948484848"
                ],
                "item_details" => array([
                    "id" => "1388998298204",
                    "price" => 5000,
                    "quantity" => 1,
                    "name" => "Panci Miako"
                ], [
                    "id" => "1388998298202",
                    "price" => 5000,
                    "quantity" => 1,
                    "name" => "Ayam Geprek"
                ]),
                "bank_transfer" => [
                    "bank" => "bca",
                    "va_number" => "111111",
                ]
            );

		} catch (\Exception $e) {
		           
        }
    }
}
