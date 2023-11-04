<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Service;

use Jostkleigrewe\OpenAiCoreBundle\Serializer\OpenAiSerializer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;


class OpenAiSerializerService
{

    const FORMAT = 'json';

    public function __construct(
        private readonly OpenAiSerializer $serializer,
    ) {

    }


    public function serialize($requestDTO): string
    {
        return $this->serializer->serialize(
            $requestDTO,
            self::FORMAT,
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
            ]
        );
    }

    public function deserialize(string $jsonString, string $className): object
    {
        return $this->serializer->deserialize(
            $jsonString,
            $className,
            self::FORMAT,
            []
        );
    }
}