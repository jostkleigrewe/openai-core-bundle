<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class OpenAiSerializer extends Serializer
{
    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer(
            nameConverter: new CamelCaseToSnakeCaseNameConverter()
        )];

        parent::__construct($normalizers, $encoders);
    }
}