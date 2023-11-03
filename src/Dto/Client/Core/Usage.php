<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;

use Symfony\Component\Serializer\Annotation;

/**
 * Data Transfer Object for Usage
 *
 * Usage statistics for the completion request.
 *
 * @link https://platform.openai.com/docs/api-reference/completions/object#completions/object-usage
 */
class Usage
{
    /**
     * Number of tokens in the generated completion.
     *
     * @var int $completion_tokens
     * @Annotation\SerializedName("completion_tokens")
     */
    public int $completion_tokens;

    /**
     * Number of tokens in the prompt.
     *
     * @var int $prompt_tokens
     * @Annotation\SerializedName("prompt_tokens")
     */
    public int $prompt_tokens;

    /**
     * Total number of tokens used in the request (prompt + completion).
     *
     * @var int $total_tokens
     * @Annotation\SerializedName("total_tokens")
     */
    public int $total_tokens;

    /**
     * @param int $completion_tokens
     * @param int $prompt_tokens
     * @param int $total_tokens
     */
    public function __construct(int $completion_tokens, int $prompt_tokens, int $total_tokens)
    {
        $this->completion_tokens = $completion_tokens;
        $this->prompt_tokens = $prompt_tokens;
        $this->total_tokens = $total_tokens;
    }


    public function getCompletionTokens(): int
    {
        return $this->completion_tokens;
    }

    public function setCompletionTokens(int $completion_tokens): Usage
    {
        $this->completion_tokens = $completion_tokens;
        return $this;
    }

    public function getPromptTokens(): int
    {
        return $this->prompt_tokens;
    }

    public function setPromptTokens(int $prompt_tokens): Usage
    {
        $this->prompt_tokens = $prompt_tokens;
        return $this;
    }

    public function getTotalTokens(): int
    {
        return $this->total_tokens;
    }

    public function setTotalTokens(int $total_tokens): Usage
    {
        $this->total_tokens = $total_tokens;
        return $this;
    }


}