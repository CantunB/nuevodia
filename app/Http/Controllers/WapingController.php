<?php

namespace App\Http\Controllers;
use GuzzleHttp;
use Illuminate\Http\Request;

class WapingController extends Controller
{
    public function send()
    {
        //echo 'Whatsapito';    
        $json = 
        [
            'token'=>'38c26d5bc013b42b50b57bb8527fb2f3',
            'source'=> 9381726488,
            'destination' => 9821363496,
            'type' => 'text',
            'body' =>   [
                        'text' => 'Hola desde Laravel VaXCampeche'
                        ]
        ];
        //return json_encode($json);
        $client = new GuzzleHttp\Client();
        $response = $client->request('POST','http://waping.es/api/send',
        ['headers' => ['Content-Type' => 'application/json'],
        'json' => $json ]);
         
        echo $response->getStatusCode();
        echo $response->getBody();

    }
}
