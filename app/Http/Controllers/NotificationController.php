<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendNotification(Request $request)
    {
        $api_access_key = "AAAAf6i1Frg:APA91bFnmrrzh9atOprB6jlsmlQ6VS7RCICRh1yri9z3ebdmmqt04yvD40jVfYd22Po5llOznxasubyBFThyDvbZhHfEvnm7EuRMsk9BpM67B4WBD1vrtVUHeT2ld8W4z_cUW50ul58P
        ";
        $fcmURL = "https://fcm.googleapis.com/fcm/send";

        $token = $request->token;


        $notification = [
            'title' => 'Easy Blood',
            'body' => 'New event has added',
            // 'icon' => '/images/bloodMarker.png',
            // 'sound' => '/images/bloodMarker.png'
        ];

        $extraNotificationData = ["message" => $notification, "moredata" => 'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token,
            'notification' => $notification,
            // 'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . $api_access_key,
            'Content-Type: application/json'
        ];



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmURL);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
        echo json_encode($fcmNotification);
    }
}
