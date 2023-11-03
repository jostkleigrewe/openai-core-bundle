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
readonly class ChatCompletionsV1Response
{
    /**
     * A unique identifier for the completion.
     *
     * @var string $id
     * @Annotation\SerializedName("id")
     */
    public readonly string $id;

    /**
     * The list of completion choices the model generated for the input prompt.
     *
     * @var Choice[] $choices
     * @Annotation\SerializedName("choices")
     */
    public readonly array $choices;

    /**
     * The Unix timestamp (in seconds) of when the completion was created.
     *
     * @var int $created
     * @Annotation\SerializedName("created")
     */
    public readonly int $created;

    /**
     * The model used for completion.
     *
     * @var string $model
     * @Annotation\SerializedName("model")
     */
    public readonly string $model;

    /**
     * The object type, which is always "text_completion"
     *
     * @var string $object
     * @Annotation\SerializedName("object")
     */
    public readonly string $object;

    /**
     * Usage statistics for the completion request.
     *
     * @var Usage $usage
     * @Annotation\SerializedName("usage")
     */
    public readonly Usage $usage;

    /**
     * @param string $id
     * @param Choice[] $choices
     * @param int $created
     * @param string $model
     * @param string $object
     * @param Usage $usage
     */
    public function __construct(
        string $id,
        array  $choices,
        int    $created,
        string $model,
        string $object,
        Usage  $usage)
    {
        $this->id = $id;
        $this->choices = $choices;
        $this->created = $created;
        $this->model = $model;
        $this->object = $object;
        $this->usage = $usage;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getUsage(): Usage
    {
        return $this->usage;
    }
}