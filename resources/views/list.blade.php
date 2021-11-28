@extends('layout')
@section('content')
<?php
    use Illuminate\Support\Facades\DB;

    $service_providers = DB::table('service_providers')->get();
    foreach ($service_providers as $service_provider) {
        echo $service_provider;
    };
