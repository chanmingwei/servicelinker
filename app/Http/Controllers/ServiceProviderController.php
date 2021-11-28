<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceProvider;

class ServiceProviderController extends Controller
{
    //
    public function create(Request $request)
    {
        $service_provider = new ServiceProvider;
        $service_provider->name = $request->name;
        $service_provider->email = $request->email;
        $service_provider->password = Hash::make($request->password);
        $service_provider->user_id = $request->id;
        $service_provider->save();
    }

    public function list(Request $request)
    {
        // info("check user", [Auth::user(),"session"=>$request->session()]);
        return response()->json(DB::table('service_providers')->get());
    }
}
