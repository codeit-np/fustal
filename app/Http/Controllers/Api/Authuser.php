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
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 400,
                'message' => 'Bad Request'
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->team = $request->team;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->name);
        $user->save();
        return response()->json([
            'status_code' => 200,
            'message' => 'user created'
        ]);
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

        $credintal = request(['email','password']);
        if(!Auth::attempt($credintal)){
            return response()->json([
                
                'message' => 'unauthorized'
            ],500);
        }

        $user = User::where('email',$request->email)->first();
        
        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            
            'token' => $tokenResult
        ],200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status_code' => 200,
            'message' => 'Token Deleted'
        ]);
    }
}
