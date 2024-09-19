<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function __construct(protected User $userModel){}

    public function register(Request $request){

        $authRegisterFields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $userRegistered = $this->userModel->create($authRegisterFields);
        $token = $userRegistered->createToken($request->name);
        return ['userRegistered' => $userRegistered, 'token' => $token ];
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = $this->userModel->where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return ['messageErrorLogin' => 'The Provide Credentials Are Incorrect'];
        }

        $token = $user->createToken($user->name);
        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return ['message' => 'You Are Logged Out'];
    }

}
