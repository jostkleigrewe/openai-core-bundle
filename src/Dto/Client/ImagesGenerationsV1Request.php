<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;

use Symfony\Component\Serializer\Annotation;


/**
 * Creates an image given a prompt.
 *
 * @link https://platform.openai.com/docs/api-reference/images/create
 */
class ImagesGenerationsV1Request
{
    public const URL = '/v1/images/generations';

    public const RESPONSE_FORMAT_URL = 'url';
    public const RESPONSE_FORMAT_B64_JSON = 'b64_json';

    public const SIZE_256_256 = '256x256';
    public const SIZE_512_512 = '512x512';
    public const SIZE_1024_1024 = '1024x1024';

    /**
     * A text description of the desired image(s). The maximum length is 1000 characters.
     *
     * @var string $prompt
     * @Annotation\SerializedName("prompt")
     */
    public string $prompt;

    /**
     * The number of images to generate. Must be between 1 and 10.
     * Defaults to 1.
     *
     * @var int|null $n
     * @Annotation\SerializedName("n")
     */
    public ?int $n = null;

    /**
     * The format in which the generated images are returned. Must be one of url or b64_json
     * Defaults to url.
     *
     * @var ?string $response_format
     * @Annotation\SerializedName("response_format")
     */
    public ?string $response_format;

    /**
     * The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024.
     * Defaults to 1024x1024
     *
     * @var ?string $size
     * @Annotation\SerializedName("size")
     */
    public ?string $size;

    /**
     * A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse.
     *
     * @var string|null $user
     * @Annotation\SerializedName("user")
     *
     * @link https://platform.openai.com/docs/guides/safety-best-practices/end-user-ids
     */
    public ?string $user = null;

    /**
     * @param string      $prompt
     * @param int|null    $n
     * @param string|null $response_format
     * @param string|null $size
     * @param string|null $user
     */
    public function __construct(
        string $prompt,
        ?int $n,
        ?string $response_format,
        ?string $size,
        ?string $user)
    {
        $this->prompt = $prompt;
        $this->n = $n;
        $this->response_format = $response_format;
        $this->size = $size;
        $this->user = $user;
    }

    public function getPrompt(): string
    {
        return $this->prompt;
    }

    public function setPrompt(string $prompt): ImagesGenerationsV1Request
    {
        $this->prompt = $prompt;
        return $this;
    }

    public function getN(): ?int
    {
        return $this->n;
    }

    public function setN(?int $n): ImagesGenerationsV1Request
    {
        $this->n = $n;
        return $this;
    }

    public function getResponseFormat(): ?string
    {
        return $this->response_format;
    }

    public function setResponseFormat(?string $response_format): ImagesGenerationsV1Request
    {
        $this->response_format = $response_format;
        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): ImagesGenerationsV1Request
    {
        $this->size = $size;
        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): ImagesGenerationsV1Request
    {
        $this->user = $user;
        return $this;
    }
}