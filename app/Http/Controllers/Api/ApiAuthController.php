<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    // login
    public function login(LoginRequest $request)
    {
        // validate
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
