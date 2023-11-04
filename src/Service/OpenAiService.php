<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Request;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\ChatCompletionsV1Response;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\CompletionsV1Request;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\CompletionsV1Response;
use Jostkleigrewe\OpenAiCoreBundle\Serializer\OpenAiSerializer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception as HttpClientException;

class OpenAiService
{
    public function __construct(
        private readonly string                  $apikey,
        private readonly HttpClientInterface     $openAiClient,
        private readonly OpenAiSerializerService $serializerService,
    ) {

    }

    public function sendCompletions(
        CompletionsV1Request $requestDTO
    ): CompletionsV1Response
    {

        //  settings
        $requestDTO->setTemperature(0.5);

        //  serialize request
        $requestJSON = $this->serializerService->serialize($requestDTO);

        //  send request
        $response = $this->openAiClient->request(
            'POST',
            CompletionsV1Request::URL,
            [
                'json' => $requestJSON
            ]
        );

        //  deserialize response
        $responseDto = $this->serializerService->deserialize(
            $response->getContent(),
            CompletionsV1Response::class,
            'json'
        );



        return $responseDto;
    }


    /**
     * Diese Methode sendet eine ChatCompletionsV1Request an die OpenAi-API
     * und gibt eine ChatCompletionsV1Response zurück.
     *
     * @param ChatCompletionsV1Request $requestDTO
     * @return ChatCompletionsV1Response
     * @throws HttpClientException\ClientExceptionInterface
     * @throws HttpClientException\RedirectionExceptionInterface
     * @throws HttpClientException\ServerExceptionInterface
     * @throws HttpClientException\TransportExceptionInterface
     */
    public function sendChatCompletions(
        ChatCompletionsV1Request $requestDTO
    ): ChatCompletionsV1Response
    {

        //  settings
        $requestDTO->setTemperature(0.7);
        $requestDTO->setMaxTokens(25);

        //  serialize request
        $requestJSON = $this->serializerService->serialize($requestDTO);

        //  send request
        $response = $this->openAiClient->request(
            'POST',
            $requestDTO::URL,
            [
                'body' => $requestJSON
            ]
        );

        //  deserialize response
        $responseDto = $this->serializerService->deserialize(
            $response->getContent(),
            ChatCompletionsV1Response::class);
        /** @var ChatCompletionsV1Response $responseDto */

        // create json from response
        $responseJSON = $this->serializerService->serialize($responseDto);

        return $responseDto;
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