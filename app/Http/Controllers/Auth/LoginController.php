<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            $user = Auth::guard()->user();
            $user->generateToken();

            return response()->json([
                'data' => $user->toArray(),
            ]);
        }
        else {
          throw ValidationException::withMessages([
              'email' => ["Authorisation failed"],
          ]);
        }
    }

    public function logout(Request $request) {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
            return response()->json(['data' => 'User logged out!'], 200);
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
}
