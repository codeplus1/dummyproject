<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //register code for mobile Device
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Bad Request',
                'code' => 401
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'user Created',
            'code' => 200
        ]);
    }
    //login code for mobile Device
    public function login(Request $request)
    {
       $validator = validator::make($request->all(),[
           'email' => 'required|email',
           'password' => 'required',
       ]);

       if($validator->fails()){
           return response()->json([
               'message' => 'Bad Request',
               'code' => 401
           ]);
       }

       $credintial = request(['email','password']);

       if(!Auth::attempt($credintial)){
           return response()->json([
               'code' => 500,
               'message' => 'Unauthorized'
           ]);
       }

       $user = User::where('email',$request->email)->first();

       $tokenResult = $user->createToken('authToken')->plainTextToken;

       return response()->json([
           'token' => $tokenResult,
           'code' => 200
       ]);
    }

    //logout for mobile device
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token Expired',
            'code' => 200
        ]);
    }
}
