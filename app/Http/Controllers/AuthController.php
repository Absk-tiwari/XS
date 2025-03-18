<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        // return $request->all();
        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
       
        $user = User::create([
            'name' => "$request->fname $request->lname",
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([ 'status'=> true, 'message' => 'User registered successfully'], 201);
    }

    public function login(Request $request) 
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        Log::info('Stored password:', ['password' => $user->password]);
        Log::info('Entered password:', ['password' => $request->password]);
    
        if (!Hash::check('121212', $user->password)) {
            return response()->json(['error' => 'Password is incorrect'], 401);
        }
    
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
