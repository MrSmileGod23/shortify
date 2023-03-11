<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Http;

class ChatGPTService {

    public function askToChatGPT($prompt)
    {
        $text = 'Интерпретируй текст большого объёма в короткий и понятный текст:';
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
                "prompt" => $text.$prompt,
                "max_tokens" => 1000,
                "temperature" => 0.5
            ]);

        return json_decode($response->getBody(), true);
    }


}

