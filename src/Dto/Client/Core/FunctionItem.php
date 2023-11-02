<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core;

use Symfony\Component\Serializer\Annotation;

/**
 * @link https://platform.openai.com/docs/api-reference/completions/create
 */
class FunctionItem
{
    /**
     * A description of what the function does,
     * used by the model to choose when and how to call the function.
     *
     * @var string|null $description
     * @Annotation\SerializedName("description")
     */
    public ?string $description;

    /**
     * The name of the function to be called. Must be a-z, A-Z, 0-9,
     * or contain underscores and dashes, with a maximum length of 64.
     *
     * @var string $name
     * @Annotation\SerializedName("name")
     */
    public string $name;

    /**
     * TThe parameters the functions accepts, described as a JSON Schema object.
     * See the guide for examples, and the JSON Schema reference for documentation
     * about the format.
     *
     * To describe a function that accepts no parameters, provide the value {"type": "object", "properties": {}}
     *
     * @var string $parameters
     * @Annotation\SerializedName("parameters")
     */
    public string $parameters;

}