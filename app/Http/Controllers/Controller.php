<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

    public function getServiceResponse($request_api, $method, $path = '', $query = [], $post = [], $returnResponseString = false) {
        $client = new \GuzzleHttp\Client();
        $request_url = env($request_api);
        if (empty($request_url)) {
            return response()->json(['message' => 'service not found'], 404);
        }
        try {
            $response = $client->{$method}($request_url . $path . '?' . http_build_query($query), [
                'auth' => [
                    env('SERVICE_USERNAME'),
                    env('SERVICE_PASSWORD')
                ],
                'form_params' => $post,
            ]);
            $responseString = $response->getBody();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseString = $response->getBody()->getContents();
        }
        if ($returnResponseString) {
            return $responseString;
        }
        return response()->json(json_decode($responseString, 1));
    }

}
