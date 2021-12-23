<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use DateTime;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {

        $order = new Order;
        $order->customer_id = Auth::id();
        $order->save();
        $availability = new Availability;
        $availability->start_time = DateTime::createFromFormat("Y-m-d\TG:i:s.uO", $request->start_time);
        $availability->end_time = DateTime::createFromFormat("Y-m-d\TG:i:s.uO", $request->end_time);
        $availability->order_id = $order->id;
        $availability->save();
    }

    public function list(Request $request)
    {
        return response()->json(DB::table('orders')->get());
    }
}
