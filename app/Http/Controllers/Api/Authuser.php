<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authuser extends Controller
{
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'team' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        }

        $user = new User();
        $user->name = $request->name;
        $user->team = $request->team;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->name);
        $user->is_admin = $request->is_admin;
        $user->save();
        return response()->json([
            
            'message' => 'user created'
        ],200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
            
    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Bad Request'
            ],400);
        }

       


        $credential = request(['email','password']);

        

        $user = User::where('email',$request->email)->first();
        
        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'token' => $tokenResult
        ],200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            
            'message' => 'Token Deleted'
        ],200);
    }
}
