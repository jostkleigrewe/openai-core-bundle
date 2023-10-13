<?php
declare(strict_types = 1);

namespace Jostkleigrewe\OpenAiCoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Jostkleigrewe\AlexaCoreBundle\DependencyInjection
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Configuration implements ConfigurationInterface
{

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('jostkleigrewe_open_ai_core');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('apikey')
                    ->isRequired()
                    ->info('OpenAI API Key')
                ->end()
                ->scalarNode('organization')
                    ->defaultValue('default_organization')
                    ->info('OpenAI API Organization ID')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
