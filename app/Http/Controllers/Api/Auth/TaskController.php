<?php
namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\User;
use Exception;
use JWTAuth;
use Tymon\JWTAuth\Token;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller {

    public function __construct(){}

    public function getTasks(Request $request,$api_key){
        try{
            $task = [];
            $taskraw = helper_tasks($api_key);
            for($i = 0; $i < count($taskraw); $i++){
                $taskId = DB::table('tasks')
                        ->where('id',helper_decr($taskraw[$i]))
                        ->first();
                array_push($task,$taskId);
            }
            // return print_r($task);
            return response()->json($task);
        
        }catch(Exception $e) {
            return response()->json(['status' => 'Fail. Token invalid '. $e->getMessage()], 500); 

        }
    }
    public function update(Request $request,$api_key,$taskId){
        try{
            $taskraw = helper_tasks($api_key);
            $tasksId = helper_de_tasks($taskraw);
            if(!in_array($taskId ,$tasksId)){
                return response()->json(['status' => 'You don\'t have permission...'], 500);
            }

             $task = DB::table('tasks')
                     ->where('id',$taskId)
                     ->update(array('name' => $request->name,'times' => $request->times));

        }catch(Exception $e){
            return response()->json(['status' => 'Something went wrong'. $e->getMessage()], 500); 
        }

        return response()->json(['status'=> 'success','id' => $taskId]);
    }


    

}
