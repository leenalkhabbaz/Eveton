<?php
namespace App\Notification_class;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\t_log;
use App\User;
class record_log
{
    public static function sendNotification($fcm,$body)
    {
        $SERVER_API_KEY = 'AAAAIy2Pl1E:APA91bFiio6ip9DYhnTmRWh3_NmEDKHBVw5Kqz0OwysLoVCsCXPgZzyn7xLoPFj6tXqu1ty-m8NEyAqf46likhIhKCrPvtzSySn1wys_yXhGubqHDuClHceg01s-rrKC3whSjNgPnOrk';
  
        // payload data, it will vary according to requirement
        $data = [
            "to" => $fcm, // for single device id
            "notification"     =>  [
                'title'     => 'Evento',
                'body' => $body,]
            
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