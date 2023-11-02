<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenAiService
{
    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $openAiClient
    ) {}


    public function sendChatCompletions(
        ChatCompletionsV1Request $requestDTO
    ): array
    {




        $response = $this->openAiClient->request(
            'POST',
            '/v1/chat/completions',
            [
                'headers' => [
////                    'Authorization' => 'Bearer '.$this->apikey,
////                    'Content-Type' => 'application/json',
                ],
                'json' => $requestDTO

//                'json' => [
//                    "model" => "gpt-4",
//                    "messages" => [
//                        [
//                            "role"=> "user",
//                            "content"=> $message
//                        ]
//                    ],
//                    "temperature" => 0.7,
//                    "max_tokens" => 256,
////                    top_p=1,
////                    frequency_penalty=0,
////                    presence_penalty=0
//                ],
            ]
        );
//            dump($this->apikey);
//            dump($response);
//            dump($response->getContent());
//die;

        dump($response);die;

        return $response->toArray();
    }




    public function sendMessage(string $message): array
    {

        $response = $this->openAiClient->request(
            'POST',
            '/v1/chat/completions',
            [
                'headers' => [
//                    'Authorization' => 'Bearer '.$this->apikey,
//                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    "model" => "gpt-4",
                    "messages" => [
                        [
                            "role"=> "user",
                            "content"=> $message
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
//            dump($this->apikey);
//            dump($response);
//            dump($response->getContent());
//die;

        return $response->toArray();
    }




}