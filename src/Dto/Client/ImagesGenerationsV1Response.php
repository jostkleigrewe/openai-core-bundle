<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Choice;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Image;
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
class ImagesGenerationsV1Response
{
    /**
     * The Unix timestamp (in seconds) of when the completion was created.
     *
     * @var int $created
     * @Annotation\SerializedName("created")
     */
    public readonly int $created;

    /**
     * The list of completion choices the model generated for the input prompt.
     *
     * @var Collection<Image> $data
     * @Annotation\SerializedName("choices")
     */
    public Collection $data;

    public function __construct(
        int    $created,
        array  $data)
    {
        $this->created = $created;
        $this->data = new ArrayCollection($data);
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return Collection<Image>
     */
    public function getData(): Collection
    {
        return $this->data;
    }
}