<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        $messageDataArray = array(

            "_id" => $request->_id,
            "text" => $request->text,
            "userId" => $request->userId,
            "name" => $request->name,

        );

        $messageResult = Message::create($messageDataArray);

        return $messageResult;

    }

    public function index()
    {
        $messages = Message::all();
        return response()->json([
            'status' => 200,
            'message' => 'Messages retrieved successfully',
            'data' => $messages,
        ]);
    }

}