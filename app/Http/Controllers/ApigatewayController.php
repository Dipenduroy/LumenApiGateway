<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApigatewayController extends Controller {
    
    var $serviceDetails=[];
    var $serviceUrl;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->serviceDetails=$this->getServiceDetails();
        //$this->serviceUrl=$this->serviceDetails['url'];
    }
    
    private function getServiceDetails() {
        
    }
    
    private function getResponse($method,$path='',$query=[],$post=[]) {
        $client = new \GuzzleHttp\Client();//['headers' => ['Accept' => 'application/json']]);
        
        try {
            $response = $client->{$method}('http://local.userpreferences/'.$path.'?'.http_build_query($query) , [
                'auth' => [
                    getenv('SERVICE_USERNAME'),
                    getenv('SERVICE_PASSWORD')
                ],
                'form_params'=>$post
            ]);
            $responseString=$response->getBody();
        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseString = $response->getBody()->getContents();
        }
        return response()->json(json_decode($responseString,1));
    }

    /**
     * Get API gateway.
     *
     * @return Response
     */
    public function get(Request $request) {
        $query = $request->query();
        $path= $request->path();
        return $this->getResponse('get',$path,$query);
    }
    
    /**
     * POST API gateway.
     *
     * @return Response
     */
    public function post(Request $request) {
        $query = $request->query();
        $post = $request->post();
        $path= $request->path();
        return $this->getResponse('post',$path,$query,$post);
    }
    
    /**
     * DELETE API gateway.
     *
     * @return Response
     */
    public function delete(Request $request) {
        $query = $request->query();
        $post = $request->post();
        $path= $request->path();
        return $this->getResponse('delete',$path,$query,$post);
    }

}
