<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function store(Request $request)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendNotification(Request $request)
    {
        $api_access_key = "AAAAH2ySW4A:APA91bGdIVNhmWOz9djHDkt33S_1B1xK0pF-yFcSQlebciGZoVL5PbHSihbDk7UfM20W6_hrNOOXYHld18Pw5Nw9VNxNTegU1tIogSWISmJ_TMn1nX-sC3a95QQaT4tDIWW20sw_QpZl";
        $fcmURL = "https://fcm.googleapis.com/fcm/send";

        $token = $request->token;

        $notification = [
            'title' => 'New Event',
            'body' => 'New event has added',
            // 'icon' => '/images/bloodMarker.png',
            // 'sound' => '/images/bloodMarker.png'
        ];

        $extraNotificationData = ["message" => $notification, "moredata" => 'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token,
            'notification' => $notification,
            'priority' => "high",

            'data' => $extraNotificationData
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
        echo $result = curl_exec($ch);
        curl_close($ch);
        echo json_encode($fcmNotification);
    }
    public function requestNotification(Request $request)
    {
        $api_access_key = "AAAAH2ySW4A:APA91bGdIVNhmWOz9djHDkt33S_1B1xK0pF-yFcSQlebciGZoVL5PbHSihbDk7UfM20W6_hrNOOXYHld18Pw5Nw9VNxNTegU1tIogSWISmJ_TMn1nX-sC3a95QQaT4tDIWW20sw_QpZl";
        $fcmURL = "https://fcm.googleapis.com/fcm/send";

        $token = $request->token;

        $notification = [
            'title' => 'New Request',
            'body' => 'New request has been made',
            // 'icon' => '/images/bloodMarker.png',
            // 'sound' => '/images/bloodMarker.png'
        ];

        $extraNotificationData = ["message" => $notification, "moredata" => 'dd', "click_action" => "FLUTTER_NOTIFICATION_CLICK"];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'registration_ids'        => $token,
            'notification' => $notification,
            'priority' => "high",

            'data' => $extraNotificationData
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
        echo $result = curl_exec($ch);
        curl_close($ch);
        echo json_encode($fcmNotification);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->notificationToken = $request->notificationToken;
        $user->save();
    }

    public function show($id)
    {
        //

    }
}
