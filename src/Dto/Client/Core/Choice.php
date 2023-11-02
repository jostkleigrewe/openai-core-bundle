<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;

use Symfony\Component\Serializer\Annotation;

/**
 * @link https://platform.openai.com/docs/api-reference/completions/object
 */
class Choice
{
    public const FINISH_REASON_LENGTH = 'length';
    public const FINISH_REASON_STOP = 'stop';
    public const FINISH_REASON_CONTENT_FILTER = 'content_filter';

    /**
     * Generated text
     *
     * @var string $text
     * @Annotation\SerializedName("text")
     */
    public string $text;

    /**
     * Index of the answer (starting with 0)
     *
     * @var int $index
     * @Annotation\SerializedName("index")
     */
    public int $index;

    /**
     * The reason the model stopped generating tokens
     *
     * @var string $finish_reason
     * @Annotation\SerializedName("finish_reason")
     */
    public string $finish_reason;

    /**
     * Die Logarithmus-Wahrscheinlichkeiten der generierten Tokens
     *
     * @var ?object $logprobs
     * @Annotation\SerializedName("logprobs")
     */
    public $logprobs;

}