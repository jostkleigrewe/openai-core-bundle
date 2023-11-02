<?php

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;


/**
 * @link https://platform.openai.com/docs/api-reference/completions/create
 */
readonly class Message
{

    /**
     * Number of tokens in the generated completion.
     *
     * @var string $role
     * @Annotation\SerializedName("role")
     */
    private string $role;

    /**
     * Number of tokens in the generated completion.
     *
     * @var string $content
     * @Annotation\SerializedName("content")
     */
    private string $content;

}