<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test-broadcast', function(){
    broadcast(new \App\Events\ExampleEvent);
    return ['ok'=>true];
});

Route::any('broadcasting/auth',function(){
    $request = request();
    $ch = $request->input('channel_name','');
    $header  = $request->header();
    $token = $request->header('authorization','');
    $tokens = explode(' ',$token);
    logger()->info(json_encode($tokens));
    if(count($tokens) > 1) {
        $token = $tokens[1];
    }
    if ($token == '33333333') {
        return ['channel_name' => $ch];
    }
    return response('',403);
});