<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApigatewayController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * API gateway handle.
     *
     * @return Response
     */
    public function handle(Request $request) {
        $path = $request->path();
        list(,$request_api)=explode('/',$path);
        $method = $request->method();
        $query = $request->query();
        $post = $request->post();        
        return $this->getServiceResponse(strtoupper(str_replace('-','_',$request_api)), strtolower($method), $path, $query, $post);
    }

}
