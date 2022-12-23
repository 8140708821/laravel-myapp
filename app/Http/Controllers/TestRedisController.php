<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestRedisController extends Controller
{
    /**
     * Index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // dd(Redis::del('userData'));
        $usersData = [];
        if (!Redis::exists('userData')) {
            $usersList = User::select('id', 'name', 'email')->get();
            $usersData =  !$usersList->isEmpty() ? $usersList->toArray() : [];
            Redis::set('userData', json_encode($usersData));
        }
        $usersData = json_decode(Redis::get('userData'));
        return response()->json([
            'message' => 'Get user data successfully.',
            'data' => $usersData,
        ], 200);
    }
}
