<?php
namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\User;
use JWTAuth;


class HomeController extends Controller {

    public function __construct()
    {
      //  $this->middleware('auth:api', ['except' => ['login']]);
    }

    
    public function home(Request $request){
        $uID = $request->uID;
        $client = new \GuzzleHttp\Client(['base_uri' => request()->getHttpHost().'/laravel/public/']);
        $response = $client->request('GET', 'api/user/'.$uID);
        
       // return $response->getBody()->getContents();
       $user = json_decode($response->getBody()->getContents(), true);
       

       $response1 = $client->request('GET', 'api/'.$user['api_key'].'/tasks');
       $task = $response1->getBody()->getContents();


       return view('home')->with('user', $user)
                          ->with('tasks',json_decode($task, true));
      
    //  return json_decode($task, true);
   //  return response()->json(json_decode($user, true)['api_key']);
    }
}

?>