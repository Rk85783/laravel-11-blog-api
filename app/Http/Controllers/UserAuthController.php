<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //
    function login(Request $request)
    {
        // return "login function";
        // return $request->all();
        $user = User::where('email', $request->email)->first();
        // return $user;
        if (!$user || !Hash::check($request->password, $user->password)) {
            return ['success' => false, "result" => "User not found"];
        }
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return ['success' => true, 'message' => "User registered successfully", "result" => $success];
    }

    function signup(Request $request)
    {
        // return "signup function";
        // return $input;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        return ['success' => true, 'message' => "User registered successfully", "result" => $success];
    }
}
