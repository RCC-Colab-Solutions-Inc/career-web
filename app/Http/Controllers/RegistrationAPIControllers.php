<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\User;

class RegistrationAPIControllers extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $newuser = new User();
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->password = $this->encryptPassword($request->password);
        $newuser->save();

        return response()->json([
            'message' => 'User created successfully',
            'user' => $newuser
        ], 201);
        



    }
    private function encryptPassword($password){
       
         $encrypted = password_hash($password, PASSWORD_DEFAULT);
        return $encrypted;
    }
}
