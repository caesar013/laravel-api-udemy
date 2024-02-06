<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    // login
    public function login(LoginRequest $request)
    {
        // validate with Auth::attempt
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $token = $request->user()->createToken('token')->accessToken;
            return new LoginResource([
                'user' => $request->user(),
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
        // check if user exists
        // check if password is correct
        // create token
        // return response
    }

    // register
    public function register(Request $request)
    {
        // validate
        // create user
        // return user
    }

    // logout
    public function logout(Request $request)
    {
    }
}
