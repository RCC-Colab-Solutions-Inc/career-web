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
        $mail = new MailSettingController();
        


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
        

        $email = $request->email;
        $subject = "Your account has been created";
        $cc = ['automatic-message@rcccolabsolutions.com']; // Convert to an array
    $bcc = ['automatic-message@rcccolabsolutions.com']; // Convert to an array
        //get the blade for the body
        $body = view('emails.registration', [
            'email' => $request->email,
            'password' => $request->password
        ])->render();

        $sendMail = $mail->sendMail($email, $subject, $body,$cc, $bcc);

        if ($sendMail === true) {
            $newuser->save();
            return response()->json(['message' => 'User created successfully'], 201);
            
        } else {
            return response()->json([
                'message' => 'User created successfully but email not sent',
                'error' => $sendMail
            ], 201);
        }

        
        



    }
    private function encryptPassword($password){
       
         $encrypted = password_hash($password, PASSWORD_DEFAULT);
        return $encrypted;
    }
}
