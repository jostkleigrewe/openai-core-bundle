<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;

use Symfony\Component\Serializer\Annotation;

/**
 * @link https://platform.openai.com/docs/api-reference/completions/create
 */
class Parameter
{

    public const TYPE_OBJECT = 'object';

    /**
     * A description of what the function does,
     * used by the model to choose when and how to call the function.
     *
     * @var string $type
     * @Annotation\SerializedName("type")
     */
    public string $type;

    /**
     * The name of the function to be called. Must be a-z, A-Z, 0-9,
     * or contain underscores and dashes, with a maximum length of 64.
     *
     * @var array<string, object> $properties
     * @Annotation\SerializedName("properties")
     */
    public array $properties;

    /**
     * @param string $type
     * @param object[] $properties
     */
    public function __construct(string $type, array $properties)
    {
        $this->type = $type;
        $this->properties = $properties;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Parameter
    {
        $this->type = $type;
        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): Parameter
    {
        $this->properties = $properties;
        return $this;
    }

    public function addProperty(string $name, object $property): Parameter
    {
        $this->properties[$name] = $property;
        return $this;
    }
}