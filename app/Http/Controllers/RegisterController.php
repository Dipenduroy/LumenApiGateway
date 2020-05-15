<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users|max:200',
            'password' => 'required|max:200',
            'user_subject' => 'array'
        ]);
        $userdata = $request->only(['name', 'email', 'password']);
        $userdata['password'] = Hash::make($userdata['password']);
        $response = User::create($userdata);
        $user_subject_data = $request->input('user_subject', []);
        if (!empty($user_subject_data)) {
            $user_subject_response_string = $this->getServiceResponse('USER_SUBJECTS', 'post',
                    'api/user-subjects/user/' . $response->id, [],
                    ['user_subject' => $user_subject_data], true);
            $user_subject = json_decode($user_subject_response_string, 1);
            if (!empty($user_subject)) {
                $response['user_subject'] = $user_subject;
            }
        }
        return response()->json($response, 201);
    }

}
