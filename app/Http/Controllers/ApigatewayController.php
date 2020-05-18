<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        list(, $request_api, $user_key, $user_id) = explode('/', $path);
        if ($user_key == 'user') {
            User::findOrFail($user_id);
            if ($user_id != Auth::id()) {
                abort(403);
            }
        }
        $method = $request->method();
        $query = $request->query();
        $post = $request->post();
        return $this->getServiceResponse(strtoupper(str_replace('-', '_', $request_api)), strtolower($method), $path, $query, $post);
    }

}
