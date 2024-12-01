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
use App\Models\UserBadges;
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






    public function updateChallengeRequestById(Request $request) {
        $fields = $request->validate([
            'id' => 'required|string',
            'challenge_status' => 'required|string',

        ]);

         // Create Token row
         $challenges = Invitations::where('id', $fields['id'])->first();
         $challenges->status = $fields['challenge_status'];
         $challenges->save();

        $response = [
            'challenges' => $challenges,
            'message' => 'success'
        ];

        return response($response, 201);
    }


    public function updateChallengeById(Request $request) {
        $fields = $request->validate([
            'id' => 'required|string',

        ]);

         // Create Token row
         $challenges = Challenges::where('challenges.id', $fields['id'])->where('status', 1)
         ->join('users', 'users.user_code', '=', 'challenges.user_code')
         ->select('challenges.*','users.name as Username','users.time_zone as time_zone')
         ->first();

         $dates =Carbon::now($challenges->time_zone);
         $now = date("Y-m-d h:i A", strtotime($dates));

         $challenges->status = 2;
         $challenges->end_time= $now;
         $challenges->save();

       

        $response = [
            'challenges' => $challenges,
            'message' => 'success'
        ];

        return response($response, 201);
    }

    public function getChallengeRequestsByUserSent(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',

        ]);

         // Create Token row
         $challenges = ChallengeRequest::where('challenge_request.challenge_by_user_code', $fields['user_code'])
         ->orWhere('challenge_request.challenge_to_user_code', $fields['user_code'])
         ->join('users', 'users.user_code', '=', 'challenge_request.challenge_to_user_code')
         ->select('challenge_request.*','users.name as Username','users.email as Email')
         ->where('status', 1)
         ->get();
       

        $response = [
            'challenges' => $challenges,
            'message' => 'success'
        ];

        return response($response, 201);
    }

    public function getChallengeRequestsByUserGot(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',

        ]);
        $user = User::where('user_code', $request->user_code)->first();
         // Create Token row
        //  $challenges = ChallengeRequest::where('challenge_to_user_code', $fields['user_code'])
        //  ->join('users', 'users.user_code', '=', 'challenge_request.challenge_by_user_code')->select('challenge_request.*','users.name as Username','users.email as Email')
        //  ->where('challenge_accept', 0)->get();
        $invitations = Invitations::where('invitations.invitation_email', $user->email)
        ->join('users', 'users.user_code', '=', 'invitations.invite_by_user_code')
        ->select('invitations.*','users.name as Username','users.email as Email')
        ->where('invitations.status', 0)
        ->get();

        $response = [
            'challenges' => $invitations,
            'message' => 'success'
        ];

        return response($response, 201);
    }

    public function saveMoodandCraving(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',
            'challenge_id' => 'required|string',
             'challenge_code' => 'required|string',
            'mood' => 'required|string',
            'craving' => 'required|string'

        ]);
        $challenges = Challenges::where('id', $fields['challenge_id'])->where('status', 1)->first();

        $start_at = date("Y-m-d h:i A", strtotime("$challenges->challenge_start_date $challenges->challenge_start_time"));
            $now = date("Y-m-d h:i A", strtotime("now"));
            $diff = abs(strtotime($now) - strtotime($start_at));

         // Create Token row
         $data = MoodandCraving::create([
            'user_code' => $fields['user_code'],
            'challenge_code' => $fields['challenge_code'],
            'challenge_id' => $fields['challenge_id'],
            'mood' => $fields['mood'],
            'time' => $diff,
            'craving' => $fields['craving'],
        ]);

        $response = [
            'data' => $data,
            'message' => 'success'
        ];

        return response($response, 201);
    }

    public function getMyPreviousChallenges(Request $request) {
        $fields = $request->validate([
            'user_code' => 'required|string',

        ]);

         // Create Token row
         $mychallenges = Challenges::where('challenges.user_code', $fields['user_code'])
         ->join('users', 'users.user_code', '=', 'challenges.user_code')
         ->select('challenges.*','users.name as Username','users.email as Email')
         ->get();
       

        $response = [
            'mychallenges' => $mychallenges,
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

   public function getMyBadges(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);

  
    //  $mybadges = UserBadges::where('user_code', $fields['user_code'])
    //  ->join('badges', 'badges.id', '=', 'user_badges.badge_id')
    //  ->select('user_badges.*','badges.interval_time as BadgeName','badges.image as BadgeImage')->orderBy('id', 'asc')->get();
    $mybadgelast = UserBadges::where('user_code', $fields['user_code'])
     ->where('user_badges.status', 1)
     ->join('badges', 'badges.id', '=', 'user_badges.badge_id')
     ->select('user_badges.*','badges.interval_time as BadgeName','badges.image as BadgeImage','badges.id as id_badge')
     ->orderBy('user_badges.created_at', 'desc')->first();
    
     $mynextbadge;
     if( $mybadgelast){
        $nextBadgeTime=$mybadgelast->id_badge+1;
        $mynextbadge=Badges::find($nextBadgeTime);
     }
     else{
        $nextBadgeTime=1;
        $mynextbadge=Badges::find(1);
     }
    

 


    $response = [
        'mybadgelast' => $mybadgelast ,
        'mynextbadge' =>   $mynextbadge,
        'message' => 'success'
    ];

    return response($response, 200);
}

public function getAllBadges(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);


    $hourBadges = Badges::whereBetween('badge_time', [0, 86399])->orderBy('badges.created_at', 'asc')->get();
    $dayBadges = Badges::whereBetween('badge_time', [86400, 604799])->orderBy('badges.created_at', 'asc')->get();
    $weekBadges = Badges::whereBetween('badge_time', [604800, 700000])->orderBy('badges.created_at', 'asc')->get();
    


    $response = [
        'hourBadges' => $hourBadges ,
        'daybadge' =>   $dayBadges,
        'weekBadges' =>   $weekBadges,
        'message' => 'success'
    ];

    return response($response, 200);
}

public function getMyLastweekMoodandCraving(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);
//     $now = date("Y-m-d h:i:s", strtotime("now"));
//    $lastdate= date('Y-m-d h:i:s',(strtotime ( '-7 day' , strtotime ( $now) ) ));

$now = date("Y-m-d h:i:s", strtotime($request->end_date));
   $lastdate= date('Y-m-d h:i:s',strtotime ($request->start_date) );
     $myprogress = MoodandCraving::where('user_code', $fields['user_code'])
     ->whereBetween('created_at', [$lastdate,$now ])
     ->orderBy('created_at', 'asc')->get();
   

    $response = [
        'myprogress' => $myprogress,
        'message' => 'success'
    ];

    return response($response, 200);
}

public function getMyLastmonthMoodandCraving(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);
//     $now = date("Y-m-d h:i:s", strtotime("now"));
//    $lastdate= date('Y-m-d h:i:s',(strtotime ( '-30 day' , strtotime ( $now) ) ));
$now = date("Y-m-d h:i:s", strtotime($request->end_date));
   $lastdate= date('Y-m-d h:i:s',strtotime ($request->start_date) );
     $myprogress = MoodandCraving::where('user_code', $fields['user_code'])
     ->whereBetween('created_at', [$lastdate,$now ])
     ->orderBy('created_at', 'asc')->get();
   

    $response = [
        'myprogress' => $myprogress,
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

public function getMyLeaderBoard(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);
    $now = date("Y-m-d h:i:s", strtotime("now"));
   $lastdate= date('Y-m-d h:i:s',(strtotime ( '-30 day' , strtotime ( $now) ) ));



     $user_leaders =[];
     $myFriends=ChallengeRequest::where('challenge_accept', 1)
     ->where('challenge_by_user_code', $fields['user_code'])
     ->orWhere('challenge_to_user_code', $fields['user_code'])
     ->get();

     foreach ($myFriends as $key => $myFriends_all) { 
        // if($myFriends_all==){
            $allLeaders=LeaderBoard::orderBy('leader_place', 'desc')
                ->where('leader_board.user_code', $myFriends_all->challenge_by_user_code)
                ->orWhere('leader_board.user_code', $myFriends_all->challenge_to_user_code)
                ->join('users', 'users.user_code', '=', 'leader_board.user_code')
                ->select('leader_board.*','users.name as Username','users.email as Email')
                ->first();

                array_push($user_leaders, $allLeaders);
        // }
       
    }
   

    $response = [
        'allLeaders' => $user_leaders,
        'message' => 'success'
    ];

    return response($response, 200);
}

public function getMyFriendLeaderBoard(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);
    $now = date("Y-m-d h:i:s", strtotime("now"));
   $lastdate= date('Y-m-d h:i:s',(strtotime ( '-30 day' , strtotime ( $now) ) ));


   $user = User::where('user_code', $request->user_code)->first();
     $user_leaders =[];
     
     $myFriends=Invitations::
     where('status', 1)
                ->where(function ($query) use ($fields)  {
        $query->where('invite_by_user_code', $fields['user_code'])
        ->orWhere('invitation_user_code', $fields['user_code']);
    })
     ->get();

     

     foreach ($myFriends as $key => $myFriends_all) { 
        if($myFriends_all->status==1 ){

            $hourCount=0;
           
            // $allLeaders=LeaderBoard::orderBy('leader_place', 'desc')
            //     ->where('leader_board.user_code', $myFriends_all->challenge_by_user_code)
            //     ->orWhere('leader_board.user_code', $myFriends_all->challenge_to_user_code)
            //     ->join('users', 'users.user_code', '=', 'leader_board.user_code')
            //     ->select('leader_board.*','users.name as Username','users.email as Email')
            //     ->first();

                // array_push($user_leaders, $allLeaders);
               
                if($myFriends_all->invite_by_user_code==$fields['user_code']){
                    $myFriendsChallenges=challenges::where('time_elapsed', '>',604739)
                ->where('user_code', $myFriends_all->invitation_user_code)
                ->count();

                $hoursGets=challenges::where('user_code', $myFriends_all->invitation_user_code)
                ->get();

                $countofAccepted1=Invitations::where('status', 1)
                ->where(function ($query) use ($myFriends_all) {
        $query->where('invite_by_user_code', $myFriends_all->invitation_user_code)
            ->orWhere('invitation_user_code', $myFriends_all->invitation_user_code);
    })
              
                ->count();
           

                   $dayss=0;
                   if($hoursGets){
                      foreach ($hoursGets as $key => $hoursGet) { 
   
                       $hourCount=$hourCount+$hoursGet->time_elapsed;
   
                      }
                    
                      if($hourCount){
                       $dayss=(($hourCount/60)/60)/24;
                      }
                   }


                    $user = User::where('user_code', $myFriends_all->invitation_user_code)->first();
                  

                    $score=$countofAccepted1+$dayss+$myFriendsChallenges;
      
                $response = [
                    'count' => $myFriendsChallenges,
                    'countofAccepted'=> $countofAccepted1,
                    'totalHours' =>$hourCount,
                    'score'=>$score,
                    'user' => $user,
                ];

                array_push($user_leaders, $response);
                }
                else{
                    $myFriendsChallenges=challenges::where('time_elapsed', '>',604739)
                    ->where('user_code', $myFriends_all->invite_by_user_code)
                    ->count();
    
                        $user = User::where('user_code', $myFriends_all->invite_by_user_code)->first();
          $hoursGets=challenges::where('user_code', $myFriends_all->invite_by_user_code)
                ->get();


                $countofAccepted2=Invitations::where('status', 1)
                
                
                ->where(function ($query) use ($myFriends_all)  {
        $query->where('invite_by_user_code', $myFriends_all->invite_by_user_code)
                ->orWhere('invitation_user_code', $myFriends_all->invite_by_user_code);
    })
                ->count();
           

                   foreach ($hoursGets as $key => $hoursGet) { 

                    $hourCount=$hourCount+$hoursGet->time_elapsed;

                   }
                   $dayss=0;
                   if($hourCount){
                    $dayss=(($hourCount/60)/60)/24;
                   }
                  

                   $score=$countofAccepted2+$dayss+$myFriendsChallenges;
                    $response = [
                        'count' => $myFriendsChallenges,
                        'totalHours' =>$hourCount,
                        'countofAccepted'=> $countofAccepted2,
                        'score'=>$score,
                        'user' => $user,
                    ];
    
                    array_push($user_leaders, $response);
                }

            
               
                
                
               
        }
        

       
    }
    $myFriendsChallenges=challenges::where('time_elapsed', '>',604739)
    ->where('user_code', $fields['user_code'])
    ->count();
    $hourCounter=0;
    $countofAccepted3=0;
  
        $countofAccepted3=Invitations::where('status', 1)
       ->where(function ($query) use ($fields)  {
        $query->where('invite_by_user_code', $fields['user_code'])
        ->orWhere('invitation_user_code', $fields['user_code']);
    })
        ->count();
   
   
        $user = User::where('user_code', $fields['user_code'])->first();

         $hoursGets=challenges::where('user_code', $fields['user_code'])
                ->get();
                $dayss=0;
                if($hoursGets){
                   foreach ($hoursGets as $key => $hoursGet) { 

                    $hourCounter=$hourCounter+$hoursGet->time_elapsed;

                   }
                 
                   if($hourCounter){
                    $dayss=(($hourCounter/60)/60)/24;
                   }
                }

                   $score=$countofAccepted3+$dayss+$myFriendsChallenges;
                    $response = [
                        'count' => $myFriendsChallenges,
                        'countofAccepted'=> $countofAccepted3,
                        'totalHours' =>$hourCounter,
                        'score'=>$score,
                        'user' => $user,
                    ];

    array_push($user_leaders, $response);
  return response($user_leaders, 200);

    $response = [
        'allLeaders' => $user_leaders,
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

public function updateUserTimeZneById(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',
        'time_zone' => 'required|string',

    ]);

     // Create Token row
     $user = User::where('user_code', $fields['user_code'])->first();
     $user->time_zone = $fields['time_zone'];
     $user->save();

    $response = [
        'challenges' => $challenges,
        'message' => 'success'
    ];

    return response($response, 201);
}

public function saveBaselineSurvey(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);

     // Create Token row

     
        $data = BaseLineSurvey::create([
            'user_code' => $fields['user_code'],
            'name' => $request->name,
            'q1' =>$request->q1,
            'q2' =>$request->q2,
            'q3' =>$request->q3,
            'q4' =>$request->q4,
            'q5' =>$request->q5,
            'q6' =>$request->q6,
            'q7' =>$request->q7,
            'q8' =>$request->q8,
            'q9' =>$request->q9,
            'q10' =>$request->q10,
            'q11' =>$request->q11,
            'q12' =>$request->q12,
            'q13' =>$request->q13,
            'q14' =>$request->q14,
            'q15' =>$request->q15,
            'q16' =>$request->q16,
            
            
        ]);


    $response = [
        'challenges' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}

public function saveEcologicalSurvey(Request $request) {
    $fields = $request->validate([
        'user_code' => 'required|string',

    ]);

     // Create Token row

     
        // $data = EcologicalSurvey::create([
        //     'user_id' => $fields['user_code'],
        //     'data' => $request->data,
        // ]);
          $data = EcologicalSurvey::create([
            'user_code' => $fields['user_code'],
            'name' => $request->name,
               'challenge_code' => $request->challenge_code,
            'q1' =>$request->q1,
            'q2' =>$request->q2,
            'q3' =>$request->q3,
            'q4' =>$request->q4,
            'q5' =>$request->q5,
            'q6' =>$request->q6,
            'q7' =>$request->q7,
            'q8' =>$request->q8,
            'q9' =>$request->q9,
            'q10' =>$request->q10,
            
            
        ]);


    $response = [
        'challenges' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
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

///START APP

public function savePatient(Request $request) {


    $fields = $request->validate([
        'name' => 'required|string',

    ]);
   
	$json_output = json_encode(explode(', ', substr($request['smoke_items'], 1, -1)));

    $data = new Patients;
    $data->doctor_id = $request['doctorid'];
    $data->patient_name = $fields['name'];
    $data->patient_mobile = $request['mobile'];
    $data->alternative_number = $request['alternativenumber'];
    $data->patient_age = $request['age'];
    $data->gender = $request['gender'];
    $data->smoke_category = $request['smoke_category'];
    $data->smoke_items =$json_output;
    $data->alchohol = $request['alchohol'];
    $data->alchohol_duration = $request['alchohol_duration'];
    $data->other_drugs = $request['other_drugs'];
    $data->medical_history = $request['medical_history'];
    $data->occupation = $request['occupation'];
    $data->smoked_title = $request['smoked'];
    $data->smokedless_title  = $request['smokeless'];
    
    $data->save();


    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}
public function allPatient(Request $request) {
    $fields = $request->validate([
        'doctor_id' => 'required|integer',

    ]);
  
     // Create Token row
     $patient = Patients::where('doctor_id', $fields['doctor_id'])->get();

    $response = [
        'data' => $patient,
        'message' => 'success',
        'status' =>'Success',
    ];

    return response($response, 201);
}

public function getPatientDetails(Request $request) {
    $fields = $request->validate([
        'patient_id' => 'required|integer',

    ]);
  
     // Create Token row
     $patient = Patients::where('patient_id', $fields['patient_id'])->get();

    $response = [
        'data' => $patient,
        'message' => 'success'
    ];

    return response($response, 201);
}

public function getPatientSearch(Request $request) {
    $fields = $request->validate([
        'keyword' => 'required|string',

    ]);
  
     // Create Token row
     $patients = Patients::where('doctor_id', $request['doctorid'])->where('patient_name', 'like', '%'.$request->keyword.'%')->get();

    $response = [
        'data' => $patients,
        'message' => 'success'
    ];

    return response($response, 201);
}
public function UpdatePatientProductConsumed(Request $request) {
    $fields = $request->validate([
        'patientId' => 'required|integer',

    ]);
        $patient = Patients::where('patient_id', $fields['patientId'])->first();
        $patient->data= $request['productItems'];
        $patient->save();

     // Create Token row
   
  
    $response = [
        'data' => $patient,
        'message' => 'success'
    ];

    return response($response, 201);
}
public function getAppointmentByDate(Request $request) {
    $fields = $request->validate([
        'doctor_id' => 'required|integer',

    ]);
  
     // Create Token row
     $appointment = Appointment::where('doctor_id', $request['doctor_id'])->where('date', $request['date'])->get();

    $response = [
        'data' => $appointment,
        'message' => 'success'
    ];

    return response($response, 201);
}


public function saveAppointmentSession(Request $request) {
    $fields = $request->validate([
        'patientId' => 'required|integer',

    ]);
  
     // Create Token row
     $data = Appointment::create([
        'doctor_id' => $request['doctorId'],
        'user_id' => $fields['patientId'],
        'date' => $request['date'],
        'session_name' => $request['sessionname'],
        'status' => $request['status'],
        
    ]);

    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}

public function saveorUpdateSession(Request $request) {
    $fields = $request->validate([
        'patientId' => 'required|integer',

    ]);
    $patient = PatientSession::where('session_name', $request['sessionname'])->where('user_id', $request['patientId'])->first();

    if($patient){

        $patient->precentage= $request['precentage'];

        $patient->save();

    }
    else{
        $data = PatientSession::create([
            'doctor_id' => $request['doctorId'],
            'user_id' => $fields['patientId'],
            'date' => $request['date'],
            'session_name' => $request['sessionname'],
            'precentage'=>$request['precentage'],
            'status' => $request['status'],
            
        ]);
    }
     // Create Token row
   
     $data = PatientSession::where('user_id', $fields['patientId'])->first();
    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}
public function getSessionData(Request $request) {
    $fields = $request->validate([
        'patientId' => 'required|integer',

    ]);
  
   
     $data = PatientSession::where('user_id', $fields['patientId'])->get();
    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}
public function saveTestForClientFeedbacks(Request $request) {
    $fields = $request->validate([
        'patientId' => 'required|integer',

    ]);
  
     // Create Token row
     $data = TestsForClient::create([
        'patient_id' => $request['patientId'],
        'test_name' => $request['test_name'],
        'test_data' => json_encode($request['answers']),
        
    ]);

    $response = [
        'data' => $data,
        'message' => 'success'
    ];

    return response($response, 201);
}

}
