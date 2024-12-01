<?php


namespace App\CommonPHP;

use App\Models\Notifications;
use App\Models\PushTokens;

class PushNotificationCommon
{
    public static function sendNotification($receiving_user_id, $msg_body, $msg_title, $click_action, $msg_type, $msg_id=0, $sub_no = 0)
    {
        $url = "https://fcm.googleapis.com/fcm/send";
        $to = 'dRqFfwcdTZKp2fjkwQ_xub:APA91bEOL207eeUo96jDLotIkEA4FyWcMesJq6mFVOI-NlwU0vY283zVhiIfz838CmH2TdSDop0lW4z4J9DJ9M7OFi-GuSCN7QiWG9z3Kjw9HGDjC28ZW3Zmnh9nJX6MBJLfKXmV8Asy';

            if ($receiving_user_id != '') {
                $notification_model = new Notifications();
                $notification_model->notification_type = $msg_type;
                $notification_model->title = $msg_title;
                $notification_model->body = $msg_body;
                $notification_model->related_table_id = $msg_id;
                $notification_model->user_code = $receiving_user_id;
                $notification_model->status = 0;
                $notification_model->save();
            }

        $login_device_tokens = PushTokens::where('user_code', '=', $receiving_user_id)->get();
        
        \Log::info($login_device_tokens);

//        if(sizeof($login_device_tokens)>0){
            //save notification details
          
//        }

//web
//        "to" => 'fUuBZg3Ep9CSt6iqvk2pTR:APA91bH1SGyZ2j6U-HJ_HeBKx3j5hWojH6bP2ZkKmhRmTaGoyEy-cZoCjaykQp2_BaZwagFeWbnxtfFOJu6iaIm_b28bDn7kKXD1-GCux01UZ8fwRA9wkdcleJSEofpLWutpfrjw9TFE',
//mobile
//          "to" => 'fmtQVuuaR5SnQw8k3C1BQC:APA91bGh1yQc3luCS8C8XGgy9AmU0ZSRA6OwhpFWDv8n5A2GQnqFZax8CbXeLy5wWDZkk3JXmi5EpuwnYGwVUxgA2OdXb7rX1KtvE8nkVA3mHFFajClsQhBFMaTYlAz2TyAev3bCJiE1',


        foreach ($login_device_tokens as $login_device_token) {

            if ($login_device_token->device_type == 'web') {
                $fields = array(
                    "to" => $login_device_token->token,

                    "notification" => array(
                        "body" => $msg_body,
                        "title" => $msg_title,
                        "icon" => 'http://stopcannabis.sarrasa.com/assets/images/logos/app-logo.png',
                        "click_action" => $click_action),
                    "data" => array(
                        "type" => $msg_type,
                        "id" => $msg_id,
                        "sub_no" => $sub_no,
                    )
                );

                $headers = array(
                    'Authorization: key= AAAAe9E3nCs:APA91bHs06z8FvXDVqn80IaU1W8yr7BQol8jKvrhuRgpKy3QqzOpanOrEq7MlyatxV1_cqKTxmVtlxAmDBv2tVpUqOM4vVI-dj7QRCRs9hdjK1L1IY9mGdycdACskSvPC-FARsbkqHmf',
                    'Content-Type:application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
           print_r($result);
                curl_close($ch);

            } else if ($login_device_token->device_type == 'android') {
                 \Log::info('amdroid');
                $fields = array(
                 "to" => $login_device_token->token,
                    // "to" => "cfOndvgiQWuzVjgHBo4VfK:APA91bEEp6tHk960j5-dCNOnZL1dZZbXGKZFrb1KtqseGJnsUFWgG2irLoyJHMXxFIFZhuLK2R6ESmSuU84_dAbXBXM_Y5jnpZbBdjwM7Q0VXqcDTfmKpxEv9BcGbbFIEMr_9pcROnlM",

                    "notification" => array(
                        "body" => $msg_body,
                        "title" => $msg_title,
                        "icon" => 'http://stopcannabis.sarrasa.comassets/images/logos/app-logo.png',
                       // "click_action" =>'FLUTTER_NOTIFICATION_CLICK'
                    ),
                    "data" => array(
                        "type" => $msg_type,
                        "id" => $msg_id,
                        "sub_no" => $sub_no,
			"click_action" =>'FLUTTER_NOTIFICATION_CLICK',
                    )
                );

                $headers = array(
                    'Authorization: key= AAAAe9E3nCs:APA91bHs06z8FvXDVqn80IaU1W8yr7BQol8jKvrhuRgpKy3QqzOpanOrEq7MlyatxV1_cqKTxmVtlxAmDBv2tVpUqOM4vVI-dj7QRCRs9hdjK1L1IY9mGdycdACskSvPC-FARsbkqHmf',
                    'Content-Type:application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                // print_r($result);
                curl_close($ch);

            } else if ($login_device_token->device_type == 'apple') {
                 \Log::info('ios');
                $fields = array(
                    "to" => $login_device_token->token,

                    "notification" => array(
                        "body" => $msg_body,
                        "title" => $msg_title,
                        "icon" => 'http://stopcannabis.sarrasa.com/assets/images/logos/app-logo.png',
                        "click_action" =>'FLUTTER_NOTIFICATION_CLICK'),
                    "data" => array(
                        "data" => array(
                        "type" => $msg_type,
                        "id" => $msg_id,
                        "sub_no" => $sub_no,
			"click_action" =>'FLUTTER_NOTIFICATION_CLICK',
                    )

                    )
                );

                $headers = array(
                    'Authorization: key= AAAAe9E3nCs:APA91bHs06z8FvXDVqn80IaU1W8yr7BQol8jKvrhuRgpKy3QqzOpanOrEq7MlyatxV1_cqKTxmVtlxAmDBv2tVpUqOM4vVI-dj7QRCRs9hdjK1L1IY9mGdycdACskSvPC-FARsbkqHmf',
                    'Content-Type:application/json'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                // print_r($result);
                 \Log::info($result);
                curl_close($ch);
            }


        }


    }
}
