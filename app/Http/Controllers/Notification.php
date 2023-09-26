<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send(Request $request)
    {


    /**
     * Write code on Method
     *
     * @return response()


        try {
            $tokens = [];
            $tokens[] = '90|1Aq68H49MBIPkgM7fpF9eyQEiqO5GuUhfpRoGSAK';
            $serverKey = 'AAAAB5opTlw:APA91bFubtjflF96aVcHg4NHKE_IWiY47Cs_u49gvw298Pb0LG5ag18CCf0sufI165f099qd_nnaiTOkc-1hXwC3tQH4DmNH6eiGEWfvr2KvKnaZT-A3FzMwLBGrOGLemee5jogNC_wj';
            $msg = array(
                'title'     => 'لماذا نحن هنا',
                'body' => 'سؤااال صعب',
            );
            $notifyData = [
                'title'     => 'لماذا نحن هنا',
                'body' => 'سؤاااااال صعب',
            ];
            $registrationIds = $tokens;
            if (count($tokens) > 1) {
                $fields = array(
                    'registration_ids' => $registrationIds, //  for  multiple users
                    'notification'  => $notifyData,
                    'data' => $msg,
                    'priority' => 'high'
                );
            } else {
                $fields = array(
                    'to' => $registrationIds[0], //  for  only one users
                    'notification'  => $notifyData,
                    'data' => $msg,
                    'priority' => 'high'
                );
            }
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key=' . $serverKey;
            $URL = 'https://fcm.googleapis.com/fcm/send';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);
        } catch (\Exception $e) {
        }


        return $result;

       // return $response;
    }
}*/


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function send(Request $request)
    {
        return $this->sendNotification($request->device_token, array(
          "title" => "Sample Message",
          "body" => "This is Test message body"
        ));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification()
    {
        $SERVER_API_KEY = 'AAAAIy2Pl1E:APA91bFiio6ip9DYhnTmRWh3_NmEDKHBVw5Kqz0OwysLoVCsCXPgZzyn7xLoPFj6tXqu1ty-m8NEyAqf46likhIhKCrPvtzSySn1wys_yXhGubqHDuClHceg01s-rrKC3whSjNgPnOrk';

        // payload data, it will vary according to requirement
        $data = [
            "to" => 'dA_WyXh6SuWA-3kGZ3oswe:APA91bEXN9Gk9hiZQfVTeXSlghQU2q2v527oaDEW_QOLvbQS9FnAZ1kwQ5YidzUeSXS3VdVBEFVv9v5Or7yW8QSzdu_IPHgBxRSwkBfCuOCqAzdibXi6R27KRnh91kbKF10YvkENcljN', // for single device id
            "notification"     =>  [
                'title'     => 'لماذا نحن هنا',
                'body' => 'سؤاااااال صعب',]

        ];
        $dataString = json_encode($data);
        $SERVER_API_KEY='AAAAIy2Pl1E:APA91bFiio6ip9DYhnTmRWh3_NmEDKHBVw5Kqz0OwysLoVCsCXPgZzyn7xLoPFj6tXqu1ty-m8NEyAqf46likhIhKCrPvtzSySn1wys_yXhGubqHDuClHceg01s-rrKC3whSjNgPnOrk';

        $headers = [
         'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}

