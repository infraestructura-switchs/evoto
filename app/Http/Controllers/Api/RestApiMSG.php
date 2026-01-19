<?php
/**
 * Created by PhpStorm.
 * User: manuelm
 * Date: 19/05/2020
 * Time: 5:02 PM
 */
namespace diser\Http\Controllers\Api;

use diser\Http\Controllers\Controller;
use GuzzleHttp\Client;

class RestApiMSG extends Controller
{
    public function __construct()
    {

    }

    public static function enviarMessage( $message = null ,array $recipients  = [])
    {
        $nuOK =0;
        $baseUrl = 'http://150.136.61.191:8090/';//env('API_MSG_ENDPOINT');
        $url = $baseUrl;
        $accessToken = env('API_MSG__ACCESS_TOKEN');
        $client = new Client();
        /*$headers = [
            'cache-control' => 'no-cache',
            'content-type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer ' . $accessToken,
        ];*/

        $headers = [
            'cache-control' => 'no-cache',
            'Content-Type' => 'application/json'
        ];

        foreach ($recipients as $recipient){
            //dd($recipient);
            $client = new Client();
            $response = $client->request('POST', $url . 'enviarMessage',
                [
                    'json' => [
                        'mensaje' => $message,
                        'recipient' => $recipient,
                        'apiKey' => '',
                    ]
                ]
            );
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $nuOK =0;
            }else{
                //Error
                $nuOK =1;
            }
        }


        return $nuOK;
    }
}