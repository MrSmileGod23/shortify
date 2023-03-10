<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatGPTService;

class ChatController extends Controller
{
    public function index() {
        $service = new ChatGPTService();
        $response = $service->askToChatGPT('Создай стишок про суслика');
        $message = $response['choices'][0]['text'];

        return $message;
    }
}
