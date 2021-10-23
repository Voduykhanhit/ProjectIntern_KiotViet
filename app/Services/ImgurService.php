<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;

class ImgurService
{
    const END_POINT = 'https://api.imgur.com/3/image';
    const ALBUM_ID='7gnrGyX';

    public static function uploadImage($imagePath)
    {
        
            $client = new GuzzleClient();
            $request = $client->request(
            'POST',
            ImgurService::END_POINT,
            [
                'headers' => [
                    // 'Authorization' => "Client-ID ".env('CLIENT_ID') // post as anonymous
                    'Authorization' => "Bearer ".env('ACCESS_TOKEN')
                ],
                'form_params' => [
                    'image' => file_get_contents($imagePath),
                    'album' => ImgurService::ALBUM_ID
                ]
            ]
            );
                
                    $response = (string) $request->getBody();
                    $jsonResponse = json_decode($response);
                    return $jsonResponse;
         // return url of image
    }
}