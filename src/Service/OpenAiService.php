<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenAiService
{


    public function __construct(
        private readonly HttpClientInterface $httpClient
    ) {}

    public function sendMessage(string $message): array
    {
        $response = $this->httpClient->request(
            'POST',
            'https://api.openai.com/v1/chat/completions',
            [
                'headers' => [
                    'Authorization' => 'Bearer 1234567890',
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                     "model" => "gpt-4",
                     "messages" => [
                         [
                             "role"=> "user",
                             "content"=> "Sag, dies ist ein Test!"
                         ]
                     ],
                     "temperature" => 0.7,
                     "max_tokens" => 256,
//                    top_p=1,
//                    frequency_penalty=0,
//                    presence_penalty=0
                ],
            ]
        );

        dump($response);
        dump($response->getContent());

        return $response->toArray();
    }

}