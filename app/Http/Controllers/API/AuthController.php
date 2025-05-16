<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'sometimes|exists:roles,id',
        ]);

        $roleId = $request->role_id ?? Role::where('name', 'reader')->first()->id;

        if ($request->has('role_id') && Auth::check() && Auth::user()->role->name !== 'admin') {
            return response()->json(['message' => 'Unauthorized to set role'], 403);
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleId,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user->load('role'),
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = User::find(Auth::id());

        return response()->json([
            'user' => $user->load('role'),
            'token' => $token,
        ], 200);
    }

    public function me()
    {
        $user = User::find(Auth::id());

        return response()->json([
            'user' => $user->load('role'),
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'Password lama salah.'], 403);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password berhasil diubah.']);
    }
}
