<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Uuid;
class AuthController extends Controller
{
    public function register(Request $request) {
        $imageName=null;
        $UUID=Uuid::generate(4);
        $fields = $request->validate([
            'firstname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        if ($request->hasFile('profile_pic')) {
            // Get the image file
            $image = $request->file('profile_pic');

            // Define the upload path in the public directory
            $destinationPath = public_path('images');

            // Get the image extension and generate a unique name
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Move the image to the public/images directory
            $image->move($destinationPath, $imageName);

        
        }
        $user = User::create([
            'name' =>$request['firstname'],
            'doctor_fname' =>$request['firstname'],
            'doctor_lname' =>$request['firstname'],
            'email' => $request['email'],
            'user_code' => mb_convert_encoding($UUID, 'UTF-8', 'UTF-8'),
            'device_type' => 'iOS',
            'country' => $request['country'],
            'occupation' => $request['occupation'],
            'city' => $request['city'],
            'type' => 'User',
            'status' => 1,
            '$created' =>1,
            'password' => bcrypt($fields['password'])
        ]);
        

      

        $created=$user;
        $user->assignRole('User');
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' =>  $created,
            'token' => $token,
        ];

        
         return response($response,201);
        // return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
               
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}