<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Request;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Response;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\CompletionsV1Request;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\CompletionsV1Response;
use Jostkleigrewe\OpenAiCoreBundle\Serializer\OpenAiSerializer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenAiService
{
    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $openAiClient,
//        private readonly SerializerInterface $serializer,
        private readonly OpenAiSerializer $serializer,

    ) {}


    public function sendCompletionsV1Request(
        CompletionsV1Request $requestDTO
    ): CompletionsV1Response
    {

        //  settings
        $requestDTO->setTemperature(0.5);

        //  serialize request
        $requestJSON = $this->serializer->serialize(
            $requestDTO,
            'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
            ]
        );

        //  send request
        $response = $this->openAiClient->request(
            'POST',
            CompletionsV1Request::URL,
            [
                'json' => $requestJSON
            ]
        );

        //  deserialize response
        $responseDto = $this->serializer->deserialize(
            $response->getContent(),
            CompletionsV1Response::class,
            'json'
        );


        dump(__METHOD__);
        dump($responseDto);
        die;

        return $responseDto;
    }


    public function sendChatCompletions(
        ChatCompletionsV1Request $requestDTO
    ): ChatCompletionsV1Response
    {

        //  settings
        $requestDTO->setTemperature(0.5);

        //  serialize request
        $requestJSON = $this->serializer->serialize(
            $requestDTO,
            'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
            ]
        );

        //  send request
        $response = $this->openAiClient->request(
            'POST',
            ChatCompletionsV1Request::URL,
            [
                'json' => $requestJSON
            ]
        );

        //  deserialize response
        $responseDto = $this->serializer->deserialize(
            $response->getContent(),
            ChatCompletionsV1Response::class,
            'json'
        );

        dump($responseDto);
        die;

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

        dump($response);
        die;

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

    public function getApikey(): string
    {
        return $this->apikey;
    }

}