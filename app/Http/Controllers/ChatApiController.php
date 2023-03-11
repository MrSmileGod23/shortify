<?php

namespace App\Http\Controllers;

use App\Services\ChatGPTService;
use Illuminate\Http\Request;

class ChatApiController extends Controller
{
    public function index(Request $request) {
        $service = new ChatGPTService();
        $response = $service->askToChatGPT($request->get('prompt'));
        $message = $response['choices'][0]['text'];

        return $message;
    }
}
