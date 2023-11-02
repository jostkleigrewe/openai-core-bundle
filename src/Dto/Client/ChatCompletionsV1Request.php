<?php

declare(strict_types=1);

namespace Jostkleigrewe\OpenAiCoreBundle\Dto\Client;
use Symfony\Component\Serializer\Annotation;


/**
 * Creates a completion for the provided prompt and parameters.
 *
 * @link https://platform.openai.com/docs/api-reference/completions/create
 */
class ChatCompletionsV1Request
{
    public const URL = 'v1/completions';

    public const MODEL_GPT_4 = 'gpt-4';
    public const MODEL_GPT_3 = 'gpt-3.5-turbo';

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
     * The prompt text to be completed.
     * encoded as a string, array of strings, array of tokens, or array of token arrays.
     *
     * @var string[]|string $prompt
     * @Annotation\SerializedName("prompt")
     */
    public array|string $prompt;

    /**
     * Generates best_of completions server-side and returns the "best" (the one with the
     * highest log probability per token). When used with n, best_of controls the number
     * of candidate completions and n specifies how many to return – best_of must be greater than n.
     *
     * Note: Because this parameter generates many completions, it can quickly consume your token quota.
     * Use carefully and ensure that you have reasonable settings for max_tokens and stop.
     *
     * @var int|null $best_of
     * @Annotation\SerializedName("best_of")
     */
    public ?int $best_of = null;

    /**
     * Echo back the prompt in addition to the completion
     *
     * @var bool|null $echo
     * @Annotation\SerializedName("echo")
     */
    public ?bool $echo = null;

    /**
     * Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency
     * in the text so far, decreasing the model's likelihood to repeat the same line verbatim.
     *
     * @var float|null $frequency_penalty
     * @Annotation\SerializedName("frequency_penalty")
     *
     * @link https://platform.openai.com/docs/guides/gpt/parameter-details#frequency-penalty
     */
    public ?float $frequency_penalty = null;

    /**
     * Modify the likelihood of specified tokens appearing in the completion.
     *
     * @var array<string, string>|null $logit_bias
     * @Annotation\SerializedName("logit_bias")
     */
    public ?array $logit_bias = null;

    /**
     * Include the log probabilities on the logprobs most likely tokens, as well the chosen
     * tokens. For example, if logprobs is 5, the API will return a list of the 5 most likely
     * tokens. The API will always return the logprob of the sampled token, so there may be
     * up to logprobs+1 elements in the response.
     *
     * The maximum value for logprobs is 5.
     *
     * @var int|null $logprobs
     * @Annotation\SerializedName("logprobs")
     */
    public ?int $logprobs = null;

    /**
     * The maximum number of tokens to generate in the completion.
     * Defaults to 16
     *
     * @var int|null $max_tokens
     * @Annotation\SerializedName("max_tokens")
     */
    public ?int $max_tokens = null;

    /**
     * How many completions to generate for each prompt.
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
     * Up to 4 sequences where the API will stop generating further tokens.
     * The returned text will not contain the stop sequence.
     *
     * @var array<string>|null $stop
     * @Annotation\SerializedName("stop")
     */
    public ?array $stop = null;

    /**
     * Whether to stream back partial progress. If set, tokens will be sent as data-only
     * server-sent events as they become available, with the stream terminated by a
     * data: [DONE] message.
     *
     * @var bool|null $stream
     * @Annotation\SerializedName("stream")
     */
    public ?bool $stream = null;

    /**
     * The suffix that comes after a completion of inserted text.
     *
     * @var string|null $suffix
     * @Annotation\SerializedName("suffix")
     */
    public ?string $suffix = null;

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

    public function __construct(string $model, array|string $prompt)
    {
        $this->model = $model;
        $this->prompt = $prompt;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;
        return $this;
    }

    public function getPrompt(): array|string
    {
        return $this->prompt;
    }

    public function setPrompt(array|string $prompt): static
    {
        $this->prompt = $prompt;
        return $this;
    }

    public function getBestOf(): ?int
    {
        return $this->best_of;
    }

    public function setBestOf(?int $best_of): static
    {
        $this->best_of = $best_of;
        return $this;
    }

    public function getEcho(): ?bool
    {
        return $this->echo;
    }

    public function setEcho(?bool $echo): static
    {
        $this->echo = $echo;
        return $this;
    }

    public function getFrequencyPenalty(): ?float
    {
        return $this->frequency_penalty;
    }

    public function setFrequencyPenalty(?float $frequency_penalty): static
    {
        $this->frequency_penalty = $frequency_penalty;
        return $this;
    }

    public function getLogitBias(): ?array
    {
        return $this->logit_bias;
    }

    public function setLogitBias(?array $logit_bias): static
    {
        $this->logit_bias = $logit_bias;
        return $this;
    }

    public function getLogprobs(): ?int
    {
        return $this->logprobs;
    }

    public function setLogprobs(?int $logprobs): static
    {
        $this->logprobs = $logprobs;
        return $this;
    }

    public function getMaxTokens(): ?int
    {
        return $this->max_tokens;
    }

    public function setMaxTokens(?int $max_tokens): static
    {
        $this->max_tokens = $max_tokens;
        return $this;
    }

    public function getN(): ?int
    {
        return $this->n;
    }

    public function setN(?int $n): static
    {
        $this->n = $n;
        return $this;
    }

    public function getPresencePenalty(): ?float
    {
        return $this->presence_penalty;
    }

    public function setPresencePenalty(?float $presence_penalty): static
    {
        $this->presence_penalty = $presence_penalty;
        return $this;
    }

    public function getStop(): ?array
    {
        return $this->stop;
    }

    public function setStop(?array $stop): static
    {
        $this->stop = $stop;
        return $this;
    }

    public function getStream(): ?bool
    {
        return $this->stream;
    }

    public function setStream(?bool $stream): static
    {
        $this->stream = $stream;
        return $this;
    }

    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    public function setSuffix(?string $suffix): static
    {
        $this->suffix = $suffix;
        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): static
    {
        $this->temperature = $temperature;
        return $this;
    }

    public function getTopP(): ?float
    {
        return $this->top_p;
    }

    public function setTopP(?float $top_p): static
    {
        $this->top_p = $top_p;
        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): static
    {
        $this->user = $user;
        return $this;
    }
}