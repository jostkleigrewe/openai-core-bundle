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
    public const FINISH_REASON_FUNCTION_CALL = 'function_call ';

    /**
     * The reason the model stopped generating tokens
     *
     * @var string $finish_reason
     * @Annotation\SerializedName("finish_reason")
     */
    public string $finish_reason;

    /**
     * Index of the answer (starting with 0)
     *
     * @var int $index
     * @Annotation\SerializedName("index")
     */
    public int $index;

    /**
     * Generated text
     *
     * @var Message $message
     * @Annotation\SerializedName("message")
     */
    public Message $message;

    /**
     * @param string $finish_reason
     * @param int $index
     * @param Message $message
     */
    public function __construct(string $finish_reason, int $index, Message $message)
    {
        $this->finish_reason = $finish_reason;
        $this->index = $index;
        $this->message = $message;
    }

    public function getFinishReason(): string
    {
        return $this->finish_reason;
    }

    public function setFinishReason(string $finish_reason): Choice
    {
        $this->finish_reason = $finish_reason;
        return $this;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): Choice
    {
        $this->index = $index;
        return $this;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): Choice
    {
        $this->message = $message;
        return $this;
    }

    
}