<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;

use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Choice;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Usage;
use Symfony\Component\Serializer\Annotation;

/**
 * Class ChatCompletionsV1
 *
 * Represents a completion response from the API. Note: both the streamed and non-streamed
 * response objects share the same shape (unlike the chat endpoint).
 *
 * @link https://platform.openai.com/docs/api-reference/completions/object
 */
class CompletionsV1Response
{
    /**
     * A unique identifier for the completion.
     *
     * @var string $id
     * @Annotation\SerializedName("id")
     */
    private string $id;

    /**
     * The list of completion choices the model generated for the input prompt.
     *
     * @var Choice[] $choices
     * @Annotation\SerializedName("choices")
     */
    private array $choices;

    /**
     * The Unix timestamp (in seconds) of when the completion was created.
     *
     * @var int $created
     * @Annotation\SerializedName("created")
     */
    private int $created;

    /**
     * The model used for completion.
     *
     * @var string $model
     * @Annotation\SerializedName("model")
     */
    private string $model;

    /**
     * The object type, which is always "text_completion"
     *
     * @var string $object
     * @Annotation\SerializedName("object")
     */
    private string $object;

    /**
     * Usage statistics for the completion request.
     *
     * @var Usage $usage
     * @Annotation\SerializedName("usage")
     */
    private Usage $usage;

 }