<?php
declare(strict_types = 1);

namespace Jostkleigrewe\OpenAiCoreBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class JostkleigreweOpenAiCoreBundle
 *
 * @package   Jostkleigrewe\OpenAiCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class JostkleigreweOpenAiCoreBundle extends Bundle
{

    /**
     * {@inheritdoc}
     *
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }

    /**
     * This directory structure requires to configure the bundle path to its root directory
     *
     * @return string
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}