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
     * Get API gateway.
     *
     * @return Response
     */
    public function get(Request $request) {
        $this->validate($request, [
            'request_api' => 'required',
        ]);
        $input = $request->all();
        $query = $request->query();
        $path = $request->path();
        return $this->getServiceResponse($input['request_api'], 'get', $path, $query);
    }

    /**
     * POST API gateway.
     *
     * @return Response
     */
    public function post(Request $request) {
        $this->validate($request, [
            'request_api' => 'required',
        ]);
        $input = $request->all();
        $query = $request->query();
        $post = $request->post();
        $path = $request->path();
        return $this->getServiceResponse($input['request_api'], 'post', $path, $query, $post);
    }

    /**
     * DELETE API gateway.
     *
     * @return Response
     */
    public function delete(Request $request) {
        $this->validate($request, [
            'request_api' => 'required',
        ]);
        $input = $request->all();
        $query = $request->query();
        $post = $request->post();
        $path = $request->path();
        return $this->getServiceResponse($input['request_api'], 'delete', $path, $query, $post);
    }

}
