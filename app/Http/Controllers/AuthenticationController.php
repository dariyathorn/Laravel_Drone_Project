<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthAuthenticationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(AuthAuthenticationRequest $request){
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    public function logout(Request $request)
    {
        dd($request->user());
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
    public function register(Request $request){
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role_id' => request('role_id'),
            'password' => Hash::make($request->password)
        ]);
        $token = null;
        if ($user->name == 'admin') {
            $token = $user->createToken('ADMIN-TOKEN', ['select', 'create', 'update', 'delete']);
        } else {
            $token = $user->createToken("USER-TOKEN", ['select','create', 'update']);
        }


        return response()->json(['success' =>true, 'data' => $user,'token' => $token],201);
    }
}
