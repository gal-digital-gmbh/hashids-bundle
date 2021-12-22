<?php

namespace GalDigitalGmbh\HashidsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class HashidsExtension extends Extension
{
    /**
     * @param mixed[] $configs
     *
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $loader->load('services.yaml');

        $container->setParameter('hashids.salt', $config['salt']);
        $container->setParameter('hashids.min_hash_length', $config['min_hash_length']);
        $container->setParameter('hashids.alphabet', $config['alphabet']);
    }
}
