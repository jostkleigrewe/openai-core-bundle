<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Client;

interface RequestInterface
{
    public function getMethod(): string;

    public function getUrl(): string;




//    public function getOptions(): array;

}