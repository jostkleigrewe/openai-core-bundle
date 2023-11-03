<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Choice;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Usage;
use Symfony\Component\Serializer\Annotation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ChatCompletionsV1
 *
 * Represents a completion response from the API. Note: both the streamed and non-streamed
 * response objects share the same shape (unlike the chat endpoint).
 *
 * @link https://platform.openai.com/docs/api-reference/completions/object
 */
class ChatCompletionsV1Response
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
     * @var Collection<Choice> $choices
     * @Annotation\SerializedName("choices")
     */
    public Collection $choices;

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

    public function __construct(
        string $id,
        array  $choices,
        int    $created,
        string $model,
        string $object,
        Usage  $usage)
    {
        $this->id = $id;
        $this->choices = new ArrayCollection($choices);
        $this->created = $created;
        $this->model = $model;
        $this->object = $object;
        $this->usage = $usage;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Collection<Choice>
     */
    public function getChoices(): Collection
    {
        return $this->choices;
    }

//    /**
//     * @return array|Choice[]
//     */
//    public function addChoice(Choice $choice): static
//    {
//        $this->choices[] = $choice;
//        return $this;
//    }


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