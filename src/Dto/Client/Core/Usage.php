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


}