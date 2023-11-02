<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\FunctionItem;
use Jostkleigrewe\OpenAiCoreBundle\Dto\Client\Core\Message;
use Symfony\Component\Serializer\Annotation;


/**
 * Creates a model response for the given chat conversation.
 *
 * @link https://platform.openai.com/docs/api-reference/chat/create
 */
class ChatCompletionsV1Request
{
    public const URL = '/v1/chat/completions';

    public const MODEL_GPT_4 = 'gpt-4';
    public const MODEL_GPT_3 = 'gpt-3.5-turbo';

    public const FUNCTION_CALL_NONE = 'none';
    public const FUNCTION_CALL_AUTO = 'auto';

    /**
     * A list of messages comprising the conversation so far.
     *
     * @var Message[] $messages
     * @Annotation\SerializedName("messages")
     */
    public array $messages;

    /**
     * ID of the model to use for completion.
     *
     * @var string $model
     * @Annotation\SerializedName("model")
     *
     * @link https://platform.openai.com/docs/models/overview
     */
    public string $model;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency
     * in the text so far, decreasing the model's likelihood to repeat the same line verbatim.
     * Defaults to 0
     *
     * @var float|null $frequency_penalty
     * @Annotation\SerializedName("frequency_penalty")
     *
     * @link https://platform.openai.com/docs/guides/gpt/parameter-details#frequency-penalty
     */
    public ?float $frequency_penalty = null;

    /**
     * Controls how the model calls functions. "none" means the model will not call a function
     * and instead generates a message. "auto" means the model can pick between generating a
     * message or calling a function. Specifying a particular function via
     * {"name": "my_function"} forces the model to call that function. "none" is the default
     * when no functions are present. "auto" is the default if functions are present.
     *
     * @var ?string $function_call
     * @Annotation\SerializedName("function_call")
     */
    public ?string $function_call;

    /**
     * A list of functions the model may generate JSON inputs for.
     *
     * @var FunctionItem[]|null $functions
     * @Annotation\SerializedName("functions")
     */
    public ?array $functions;

    /**
     * Modify the likelihood of specified tokens appearing in the completion.
     *
     * @var array<string, string>|null $logit_bias
     * @Annotation\SerializedName("logit_bias")
     */
    public ?array $logit_bias = null;

    /**
     * The maximum number of tokens to generate in the completion.
     * Defaults to infinitiv
     *
     * @var int|null $maxTokens
     * @Annotation\SerializedName("max_tokens")
     */
    public ?int $maxTokens = null;

    /**
     * How many chat completion choices to generate for each input message.
     * Defaults to 1
     *
     * @var int|null $n
     * @Annotation\SerializedName("n")
     */
    public ?int $n = null;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they
     * appear in the text so far, increasing the model's likelihood to talk about new topics.
     * Defaults to 0
     *
     * @var float|null $presence_penalty
     * @Annotation\SerializedName("presence_penalty")
     *
     * @link https://platform.openai.com/docs/guides/gpt/parameter-details#presence-penalty
     */
    public ?float $presence_penalty = null;

    /**
     * Up to 4 sequences where the API will stop generating further tokens,
     *
     * @var array<string>|null $stop
     * @Annotation\SerializedName("stop")
     */
    public ?array $stop = null;

    /**
     * If set, partial message deltas will be sent, like in ChatGPT. Tokens will be sent as
     * data-only server-sent events as they become available, with the stream terminated by
     * a data: [DONE] message. Defaults to false
     *
     * @var bool|null $stream
     * @Annotation\SerializedName("stream")
     */
    public ?bool $stream = null;

    /**
     * What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make
     * the output more random, while lower values like 0.2 will make it more focused and
     * deterministic. Defaults to 1
     *
     * We generally recommend altering this or top_p but not both.
     *
     * @var float|null $temperature
     * @Annotation\SerializedName("temperature")
     */
    public ?float $temperature = null;

    /**
     * An alternative to sampling with temperature, called nucleus sampling, where the model
     * considers the results of the tokens with top_p probability mass. So 0.1 means only the
     * tokens comprising the top 10% probability mass are considered.
     * Defaults to 1
     *
     * We generally recommend altering this or temperature but not both.
     *
     * @var float|null $top_p
     * @Annotation\SerializedName("top_p")
     */
    public ?float $top_p = null;

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
     * @param Message[] $messages
     * @param string $model

     */
    public function __construct(
        string  $model,
        array   $messages,
    )
    {
        $this->messages = $messages;
        $this->model = $model;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function setMessages(array $messages): ChatCompletionsV1Request
    {
        $this->messages = $messages;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): ChatCompletionsV1Request
    {
        $this->model = $model;
        return $this;
    }

    public function getFrequencyPenalty(): ?float
    {
        return $this->frequency_penalty;
    }

    public function setFrequencyPenalty(?float $frequency_penalty): ChatCompletionsV1Request
    {
        $this->frequency_penalty = $frequency_penalty;
        return $this;
    }

    public function getFunctionCall(): string
    {
        return $this->function_call;
    }

    public function setFunctionCall(string $function_call): ChatCompletionsV1Request
    {
        $this->function_call = $function_call;
        return $this;
    }

    public function getFunctions(): ?array
    {
        return $this->functions;
    }

    public function setFunctions(?array $functions): ChatCompletionsV1Request
    {
        $this->functions = $functions;
        return $this;
    }

    public function getLogitBias(): ?array
    {
        return $this->logit_bias;
    }

    public function setLogitBias(?array $logit_bias): ChatCompletionsV1Request
    {
        $this->logit_bias = $logit_bias;
        return $this;
    }

    public function getMaxTokens(): ?int
    {
        return $this->max_tokens;
    }

    public function setMaxTokens(?int $max_tokens): ChatCompletionsV1Request
    {
        $this->max_tokens = $max_tokens;
        return $this;
    }

    public function getN(): ?int
    {
        return $this->n;
    }

    public function setN(?int $n): ChatCompletionsV1Request
    {
        $this->n = $n;
        return $this;
    }

    public function getPresencePenalty(): ?float
    {
        return $this->presence_penalty;
    }

    public function setPresencePenalty(?float $presence_penalty): ChatCompletionsV1Request
    {
        $this->presence_penalty = $presence_penalty;
        return $this;
    }

    public function getStop(): ?array
    {
        return $this->stop;
    }

    public function setStop(?array $stop): ChatCompletionsV1Request
    {
        $this->stop = $stop;
        return $this;
    }

    public function getStream(): ?bool
    {
        return $this->stream;
    }

    public function setStream(?bool $stream): ChatCompletionsV1Request
    {
        $this->stream = $stream;
        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): ChatCompletionsV1Request
    {
        $this->temperature = $temperature;
        return $this;
    }

    public function getTopP(): ?float
    {
        return $this->top_p;
    }

    public function setTopP(?float $top_p): ChatCompletionsV1Request
    {
        $this->top_p = $top_p;
        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): ChatCompletionsV1Request
    {
        $this->user = $user;
        return $this;
    }

}