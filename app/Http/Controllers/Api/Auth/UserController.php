<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function getUserById($userId)
    {
        $user = DB::table('users')
                    ->where('id', $userId)
                    ->get();
        return response()->json($user[0]);
    }
}
