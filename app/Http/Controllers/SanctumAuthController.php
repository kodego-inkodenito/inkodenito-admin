<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SanctumAuthController extends Controller
{
    /**
     * Registration
     */
    public function register (Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4',
            'username' => 'required|min:8',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        return response()->json(['message' => 'Successfully registered'], 200);
    }

    /**
     * Login
     */
    public function login (Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
