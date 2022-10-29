<?php

namespace App\Services;
use GuzzleHttp\Client;

class ApiService{
    public function request($route){
        $client = new Client();
        $url = env('BASE_URL').$route;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }
}