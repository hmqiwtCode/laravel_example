<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Monolog\Handler\PushoverHandler;

class LoginController extends Controller
{

    public function __construct()
    {
        //  $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function register(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $timestamp = now()->timestamp;
        $taskId = '';

        $tasksDB = DB::table('tasks')->select('id')->get();
        $tasks = [];

        while (count(array_unique($tasks)) <= 2) {
            if (rand(0, 1) == 1) {
                $data = $tasksDB[rand(0, 9)]->id;
                if (!in_array($data, $tasks, true)) {
                    array_push($tasks, $data);
                }
            }
        }

        for ($i = 0; $i < count($tasks); $i++) {
            $taskId .= '.' . helper_encr($tasks[$i]);
        }

        $user = DB::table('users')
            ->insert(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'api_key' => $uuid . $timestamp . $taskId,
                    'token' => '00000',
                ],
            );
        $request->api_key = $uuid . $timestamp . $taskId;
        return $this->login($request);
    }
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        // print_r($input);
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        DB::table('users')
            ->where('email', $input['email'])
            ->limit(1)
            ->update(array('token' => $jwt_token));

        return response()->json([
            'name' => $request->name,
            'email' => $input['email'],
            'token' => $jwt_token,
            'api_key' => $request->api_key
        ]);
    }
}
