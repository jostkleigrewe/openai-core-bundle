<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;

/**
 * @link https://platform.openai.com/docs/api-reference/completions/object
 */
readonly class Choice
{
    public const FINISH_REASON_LENGTH = 'length';
    public const FINISH_REASON_STOP = 'stop';
    public const FINISH_REASON_CONTENT_FILTER = 'content_filter';

    public function __construct(

        //  Generated text
        public readonly string $text,

        //  Index of the answer (starting with 0)
        public readonly float $index,

        // The reason the model stopped generating tokens
        public readonly string $finish_reason,

        //  Die Logarithmus-Wahrscheinlichkeiten der generierten Tokens
        public readonly ?object $logprobs,

    )
    {
    }
}