<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Http;

class ChatGPTService {

    public function askToChatGPT($prompt)
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
                "prompt" => $prompt,
                "max_tokens" => 1000,
                "temperature" => 0.5
            ]);

        return json_decode($response->getBody(), true);
    }



//private $client;

//public function __construct() {
//$this->client = new Client([
//'base_uri' => 'https://api.openai.com/',
//RequestOptions::VERIFY => false,
//'headers' => [
//'Content-Type' => 'application/json',
//'Authorization' => 'Bearer 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',
//],
//]);
//}
//
//public function getResponse($prompt) {
//$response = $this->client->request('POST', 'v1/engines/text-davinci-003/completions', [
//'json' => [
//'prompt' => $prompt,
//'max_tokens' => 500,
//'temperature' => 0.7,
//],
//]);
//
//return json_decode($response->getBody(), true);
//}
}

