<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
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
            // revoke all tokens by user
            $request->user()->tokens()->delete();
            // generate token
            $token = $request->user()->createToken('token')->plainTextToken;
            // return response
            return new LoginResource([
                'user' => $request->user(),
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
    }

    // register
    public function register(RegisterRequest $request)
    {
        // create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        // generate token
        $token = $user->createToken('token')->plainTextToken;
        // return user
        return new LoginResource([
            'user' => $user,
            'token' => $token
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        // revoke current token
        // $request->user()->currentAccessToken()->delete();

        // revoke all tokens by user
        $request->user()->tokens()->delete();

        // return response
        return response()->noContent();
    }
}
