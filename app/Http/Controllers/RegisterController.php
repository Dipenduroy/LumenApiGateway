<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Register a user.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_subject' => 'array'
        ]);
        $userdata = $request->only(['name', 'email', 'password']);
        $userdata['api_token'] = uniqid(true);
        $user = User::create($userdata);
        $response['user'] = $user;
        $user_subject_data = $request->input('user_subject', []);
        if (!empty($user_subject_data)) {
            $user_subject_response_string = $this->getServiceResponse('USER_SUBJECTS_SERVICE', 'post', 'api/usersubjects', [],
                    ['user_subject' => $user_subject_data,
                        'user_id' => $user->id
                    ], true);
            $response['user_subject'] = json_decode($user_subject_response_string, 1);
        }
        return response()->json($response);
    }

}
