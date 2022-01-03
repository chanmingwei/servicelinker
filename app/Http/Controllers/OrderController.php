<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Service;
use DateTime;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {
        // dd(Auth::guard('web_customers'));
        // dd(Auth::guard());
        // $order = new Order;
        // $order->customer_id = Auth::guard('web_customers')->id();
        // $order->billing_address = $request->orderDetail['billingAddress'];
        // $order->save();
        // foreach ($request->services as $service) {
        //     $new_service = new Service;
        //     $new_service->aircon_number = $service->airconNumber;
        //     $new_service->service_type = $service->serviceType;
        //     $new_service->price = $service->airconNumber * (($service->serviceType == "Chemical Wash") ? 2 : 1);
        //     $new_service->order_id = $order->id;
        //     $new_service->save();
        // }
        return response(Auth::guard("web_customers")->id());
    }

    public function list(Request $request)
    {
        return response()->json(DB::table('orders')->where('customer_id', '=', Auth::guard("web_customers")->id())->get());
    }
}
