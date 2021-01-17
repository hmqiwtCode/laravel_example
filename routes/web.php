<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\HomeController;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Token;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    try{
        $rawToken = $_COOKIE['token'];
        $token = new Token($rawToken);
        $payload = JWTAuth::decode($token);
        if($payload['sub'])
           // return view('home');
           return redirect('/home');
    }catch(Exception $e){
        return view('login');
    }
});


//[HomeController::class, 'home']
// Route::get('/home',function(Request $request){ 
//   //  return  //print_r($_SERVER['HTTP_COOKIE']);
//   return view('home');
// })->middleware('home');

Route::get('/home',[HomeController::class, 'home'])->middleware('home');


