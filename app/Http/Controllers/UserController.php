<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {

        $userDataArray = array(

            "firstName" => $request->firstName,
            "middleName" => $request->middleName,
            "lastName" => $request->lastName,
            "address" => $request->address,
            "username" => $request->username,
            "password" => md5($request->password),

        );

        $user = User::create($userDataArray);

        return $user;

    }

    public function userLogin(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                "username" => "required",
                "password" => "required",

            ]
        );

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_error" => $validator->errors()]);
        }

        // check if entered email exists in db
        $username_status = User::where("username", $request->username)->first();

        // if email exists then we will check password for the same email

        if (!is_null($username_status)) {
            $password_status = User::where("username", $request->username)->where("password", md5($request->password))->first();

            // if password is correct
            if (!is_null($password_status)) {
                $user = $this->userDetail($request->username);

                return response()->json(["status" => 200, "success" => true, "message" => "You have logged in successfully.", "data" => $user]);

            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
            }
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect username or password."]);
        }
    }

    // ------------------ [ User Detail ] ---------------------
    public function userDetail($username)
    {
        $user = array();
        if ($username != "") {
            $user = User::where("username", $username)->first();
            return $user;
        }
    }
}
