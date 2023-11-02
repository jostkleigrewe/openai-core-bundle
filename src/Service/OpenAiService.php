<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Request;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\CompletionsV1Request;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenAiService
{
    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $openAiClient,
        private readonly SerializerInterface $serializer
    ) {}


    public function sendCompletionsV1Request(
        CompletionsV1Request $requestDTO
    ): array
    {

        $requestJSON = $this->serializer->serialize(
            $requestDTO,
            'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
//                'json_encode_options' => JSON_PRETTY_PRINT,
            ]
        );


        $response = $this->openAiClient->request(
            'POST',
            CompletionsV1Request::URL,
            [
                'headers' => [
////                    'Authorization' => 'Bearer '.$this->apikey,
////                    'Content-Type' => 'application/json',
                ],
                'json' => $requestJSON
            ]
        );


        dump(__METHOD__);
        dump($response);die;

        return $response->toArray();
    }


    public function sendChatCompletions(
        ChatCompletionsV1Request $requestDTO
    ): array
    {

        $requestJSON = $this->serializer->serialize(
            $requestDTO,
            'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
//                'json_encode_options' => JSON_PRETTY_PRINT,
            ]
        );


        $response = $this->openAiClient->request(
            'POST',
            CompletionsV1Request::URL,
            [
                'headers' => [
////                    'Authorization' => 'Bearer '.$this->apikey,
////                    'Content-Type' => 'application/json',
                ],
                'json' => $requestJSON

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