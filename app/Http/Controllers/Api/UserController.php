<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function store(Request $request) {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Successfully created user'
        ], 200);
    }

    public function update(Request $request, $user_id) {
        $user = User::find($user_id);

        if ($user) {
            if ($request->name) {
                $user->name = $request->name;
            }

            if ($request->username) {
                $user->username = $request->username;
            }

            if ($request->email) {
                $user->email = $request->email;
            }

            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return response()->json([
                'message' => 'Successfully updated user'
            ], 200);

        } else {
            return response()->json([
                'error' => 'Cannot find user'
            ], 400);
        }
    }

    public function delete($user_id) {
        $user = User::find($user_id);

        if ($user) {
            $user->delete();

            return response()->json([
                'message' => 'Successfully deleted user'
            ], 200);
        } else {
            return response()->json([
                'error' => 'User does not exist'
            ], 400);
        }
    }

    public function getUserRecipes($user_id) {
        $user = User::find($user_id);

        return response()->json([
            'recipes' => $user->recipes
        ]);
    }

    public function searchUserByName(Request $request) {
        $users = User::where('name', $request->name)
                    ->get();

        return response()->json([
            'users' => $users
        ], 200);
    }
}
