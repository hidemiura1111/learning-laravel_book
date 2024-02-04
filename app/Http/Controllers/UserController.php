<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Data\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {        
        $users = User::all();

        return response()->json([
            'data' => $users,
            'message' => 'Successfully retrieved users.',
        ]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => $user,
            'message' => 'Successfully retrieved user.',
        ]);
    }

    // 127.0.0.1:8080/api/data/users
    public function index_data()
    {
        dd(User::all());
        return UserData::collection(User::all());
    }

    // 127.0.0.1:8080/api/data/users/1
    public function show_data(User $user)
    {
        return UserData::from($user);
    }

    // 127.0.0.1:8080/api/data/users
    public function create_data(Request $request)
    {
        dd($request->all());
    }
    
    // 127.0.0.1:8080/api/data/users/1
    public function update_data(User $user, UserData $userData)
    {
        dd(User::all());
        \Log::info($user->all());
        \Log::info($userData->all());

        $res = $user->update($userData->all());

        return $res;
    }

}