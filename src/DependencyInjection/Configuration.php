<?php

namespace GalDigitalGmbh\HashidsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('hashids');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode('salt')->defaultNull()->end()
            ->scalarNode('min_hash_length')->defaultValue(0)->end()
            ->scalarNode('alphabet')->defaultValue('')->end()
        ;

        return $treeBuilder;
    }
}
