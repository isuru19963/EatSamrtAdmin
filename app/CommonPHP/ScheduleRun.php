<?php

namespace App\CommonPHP;

use Carbon\Carbon;
use App\Models\Challenges;
use App\Models\Patients;
use App\Models\TestsForClient;
use App\Models\MotivationalMessage;
use App\Models\Notifications;
use App\CommonPHP\PushNotificationCommon;
use App\Models\AllTests;
use App\Models\User;
use App\Models\Invitations;

class ScheduleRun
{
    public static function runUpdateLeaderBoard()
    {



        $users = User::where('type', 'User')->get();

        // foreach ($users as $key => $user) { 
        //     \Log::info($user->name);
        //     $dates =Carbon::now($user->time_zone);
        //     \Log::info( $dates);

        //     $dayOfWeek = date('l', strtotime($dates));
        //     \Log::info($dayOfWeek);

        //      $messages = MotivationalMessage::where('day',$dayOfWeek)
        //      ->where('time',date('H:i A', strtotime($dates)))
        //     ->first();

        //      \Log::info($messages);

        //     $challenges = Challenges::where('user_code', $user->user_code)->where('status', 1)->first();
        //     \Log::info($challenges);
        //     if($challenges){
        //         if($messages){


        //             $noty_msg_body1 =  $messages->body;
        //             $noty_msg_title1 =  $messages->title;
        //             $click_action1 = 'http://stopcannabis.sarrasa.com';
        //             $msg_type1 = 'motivational_messages';
        //             $msg_id1 = $messages->id;
        //             $sub_id1 = $messages->id;
        //            PushNotificationCommon::sendNotification($user->user_code, $noty_msg_body1, $noty_msg_title1, $click_action1, $msg_type1, $msg_id1, $sub_id1);
        //      }
        //     }


        // }






        // $invites=invitations::all();

        // foreach ($invites as $key => $invite) { 


        //     $userss = User::where('email',$invite->invitation_email)->first();


        //     if( $userss!=[]){

        //         $invitesss=invitations::where('invitation_email',$invite->invitation_email)->get();

        //         foreach ($invitesss as $key => $invites1) { 
        //             $invites12=invitations::where('id',$invites1->id)->first();
        //             $invites12->invitation_user_code=$userss->user_code;
        //             $invites12->save();
        //         }






        //     }

        // }


    }

    public static function runTimeChallenges()
    {
 


   






        // }

        // foreach ($challenges as $key => $challenge) { 
        //     $dates =Carbon::now($challenge->time_zone);
        //     $start_at = date("Y-m-d h:i A", strtotime("$challenge->challenge_start_date $challenge->challenge_start_time"));
        //     $now = date("Y-m-d h:i A", strtotime($dates));
        //     $diff = abs(strtotime($now) - strtotime($start_at));

        //     $userchallenge = Challenges::where('id',$challenge->id)->first();

        //     if($diff>=60480){

        //         $userchallenge->end_time= $now;
        //         $userchallenge->status= 2;
        //     }
        //     else{
        //         $userchallenge->time_elapsed= $diff;
        //     }
        //     $userchallenge->save();

        //     $badges = Badges::all();


        //     foreach ($badges as $key => $badge) { 
        //         if($diff>=$badge->badge_time){

        //             $userbadges = UserBadges::where('user_code',$userchallenge->user_code)
        //             ->where('status',1)
        //             ->where('badge_id',$badge->id)
        //             ->orderBy('created_at', 'desc')->first();

        //             if($userbadges){

        //             }
        //             else{
        //                 $userbadgeadd = UserBadges::create([
        //                     'badge_id' => $badge->id,
        //                     'user_code' =>  $userchallenge->user_code,
        //                     'earned_date'=>  $now
        //                 ]);

        //                 $noty_msg_body1 =  'Congratulations! You have won the '.$badge->interval_time. ' Badge!';
        //                 // $noty_msg_body1 = $message->time;
        //                 // $noty_msg_title1 = date('H:i A', strtotime($dates));
        //                 $noty_msg_title1 =  $badge->interval_time.' Badge Earned';
        //                 $click_action1 = 'http://stopcannabis.sarrasa.com';
        //                 $msg_type1 = 'badge_earned';
        //                 $msg_id1 = $userbadgeadd->id;
        //                 $sub_id1 = $userbadgeadd->id;
        //                 //dr reply to special msg
        //                 PushNotificationCommon::sendNotification($userchallenge->user_code, $noty_msg_body1, $noty_msg_title1, $click_action1, $msg_type1, $msg_id1, $sub_id1);
        //             }




        //            }
        //     }










        // }
    }
}
