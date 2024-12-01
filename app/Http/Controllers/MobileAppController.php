<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PushTokens;
use App\Models\Invitations;
use App\Models\Challenges;
use App\Models\ChallengeRequest;
use App\Models\MoodandCraving;
use App\Models\Articles;
use App\Models\Posts;
use App\Models\FoodsOrder;
use App\Models\Badges;
use App\Models\Notifications;
use App\Models\LeaderBoard;
use App\Models\BaseLineSurvey;
use App\Models\EcologicalSurvey;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use App\Mail\TestMail;
use App\Models\Patients;
use App\Models\Appointment;
use App\Models\PatientSession;
use App\Models\TestsForClient;

use App\Mail\PasswordResetSuccessMail;
use App\Mail\RegisterOTPMail;
use App\Mail\InviteMail;
use App\CommonPHP\PushNotificationCommon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MobileAppController extends Controller
{
   

    public function login(Request $request) {
        $fields = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('doctor_mobile', $fields['phone'])->first();

        // Check password
        if(!$user ) {
            return response([
                'user' => null,
                'message' => 'User Not Found'
            ], 401);
        }
        else if(!Hash::check($fields['password'], $user->password)){
            return response([
                'user' => null,
                'message' => 'Password is incorrect'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'status' =>'success',
            'token' => $token
        ];

        return response($response, 201);
    }

    public function savePushToken(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',
            'token' => 'required|string'
        ]);

         // Create Token row
         $token = PushTokens::create([
            'user_code' => $fields['user_code'],
            'token' => $fields['token'],
            'device_type' => $request->device_type,
        ]);

        $response = [
            'token' => $token,
            'message' => 'success'
        ];

        return response($response, 201);
    }

    public function deletePushToken(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',
        ]);

         // Create Token row
         $user = PushTokens::where('user_code', $fields['user_code'])->delete();

        $response = [
            'message' => 'success'
        ];

        return response($response, 201);
    }












    public function getallArticles(Request $request) {
      

         // Create Token row
         $articles = Articles::Join('categories', 'categories.id', '=', 'articles.category_id')->select('articles.*','categories.name as category_name')->get();
       

        $response = [
            'articles' => $articles,
            'message' => 'success'
        ];

        return response($response, 200);
    }
    public function getallPages(Request $request) {
      

        // Create Token row
        $articles = Posts::Join('categories', 'categories.id', '=', 'posts.category_id')->select('posts.*','categories.name as category_name')->get();
      

       $response = [
           'pages' => $articles,
           'message' => 'success'
       ];

       return response($response, 200);
   }




public function getMyNotification(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);
    $now = date("Y-m-d H:i:s", strtotime("now"));
   $lastdate= date('Y-m-d H:i:s',(strtotime ( '-24 hour' , strtotime ( $now) ) ));

     $myNotifications = Notifications::where('user_code', $fields['user_code'])
     ->whereBetween('created_at', [$lastdate,$now ])
     ->orderBy('created_at', 'desc')->get();
   
   


    $response = [
        'myNotifications' => $myNotifications,
        'message' => 'success'
    ];

    return response($response, 200);
}




public function getArticlesfromKeyword(Request $request) {
    $fields = $request->validate([
        'keyword' => 'required|string',

    ]);
   



     $user_leaders =[];
     $allArticles = Articles::all();



     foreach ($allArticles as $key => $article) { 
        $keyword=$article->keywords;
        $myArray = explode(',', $keyword);
        foreach ( $myArray as $key =>  $myKeyword) { 
            if($myKeyword==$request->keyword){
                array_push($user_leaders, $article);
            }
        }
       
    }
   

    $response = [
        'myNotifications' => $user_leaders,
        'message' => 'success'
    ];

    return response($response, 200);
}





public function passwordResetOTP(Request $request)
{

    $user = User::where('email', $request->email)->first();
 
    if($user){
        $otp = mt_rand(1000,9999);

        // $validator = \Validator::make($request->all(), ['email' => 'required|email']);
        // if ($validator->fails()) {
        //     $messages = $validator->getMessageBag();
        //     return redirect()->back()->with('error', $messages->first());
        // }
        try {
            // Mail::to($request->email)->send(new TestMail());
            Mail::to($request->email)->send(new PasswordResetMail($otp));
    
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('errors', $e->getMessage());
        }

        $response = [
          'otp' =>  $otp,
            'message' => 'sucess',
            'error'=>'false'
        ];
    
        return response($response, 200);
    }
    else{
        $response = [
            // 'myNotifications' => $user_leaders,
            'error'=>'true',
            'message' => 'Email not Registered'
        ];
    
        return response($response, 200);
    }
   
    // return redirect()->back()->with('success', __('Email send Successfully.'));
}

public function passwordReset(Request $request)
{

    $user = User::where('email', $request->email)->first();
    $user->password=bcrypt($request->password);
         $user->save();
 
    if($user){


        // $validator = \Validator::make($request->all(), ['email' => 'required|email']);
        // if ($validator->fails()) {
        //     $messages = $validator->getMessageBag();
        //     return redirect()->back()->with('error', $messages->first());
        // }
        try {
            Mail::to($request->email)->send(new PasswordResetSuccessMail($user->name));
    
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('errors', $e->getMessage());
        }

        $response = [
            'message' => 'sucess',
            'error'=>'false'
        ];
    
        return response($response, 200);
    }
    else{
        $response = [
            // 'myNotifications' => $user_leaders,
            'message' => 'Email not Registered',
            'error'=>'true'
        ];
    
        return response($response, 200);
    }
   
    // return redirect()->back()->with('success', __('Email send Successfully.'));
}

public function registerOTP(Request $request)
{

    $user = User::where('email', $request->email)->first();


 
    if($user){

        $response = [
            // 'myNotifications' => $user_leaders,
            'error'=>'true',
            'message' => 'Email already Registered'
        ];
        return response($response, 200);
    
       
    }
    else{
  
        $otp = mt_rand(1000,9999);

        // $validator = \Validator::make($request->all(), ['email' => 'required|email']);
        // if ($validator->fails()) {
        //     $messages = $validator->getMessageBag();
        //     return redirect()->back()->with('error', $messages->first());
        // }
        try {
            // Mail::to($request->email)->send(new TestMail());
            Mail::to($request->email)->send(new RegisterOTPMail($otp));
    
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('errors', $e->getMessage());
        }

        $response = [
          'otp' =>  $otp,
            'message' => 'sucess',
            'error'=>'false'
        ];
    
        return response($response, 200);
    }
   
    // return redirect()->back()->with('success', __('Email send Successfully.'));
}





///Mobile APIS

public function saveOrder(Request $request) {
    $fields = $request->validate([
        'user_id' => 'required|string',

    ]);
 

     // Create Token row
     $data = FoodsOrder::create([
        'user_id' => $request->user_id,
        'ordered_foods' => $request->ordered_foods,
        'amount' =>$request->amount,
        'order_type' => $request->order_type,
        'restaurant_id' => $request->restaurant_id,

        'payment_method' =>$request->payment_method,
        'otp' => $request->otp,
        'delivery_address' => $request->delivery_address,

        'delivery_location' =>$request->delivery_location,
        'order_note' => $request->order_note ,
        'payment_status' => $request->payment_status,
    ]);

    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}










}
