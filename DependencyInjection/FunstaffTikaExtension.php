<?php

namespace Funstaff\TikaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class FunstaffTikaExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        $container->setParameter('funstaff.tika.config.tika_path', $config['tika_path']);
        $javaPath = (array_key_exists('java_path', $config)) ? $config['java_path'] : null;
        $container->setParameter('funstaff.tika.config.java_path', $javaPath);
        $container->setParameter('funstaff.tika.config.metadata_class', $config['metadata_class']);
        $container->setParameter('funstaff.tika.config.output_format', $config['output_format']);
        $container->setParameter('funstaff.tika.config.metadata_only', $config['metadata_only']);
        $container->setParameter('funstaff.tika.config.output_encoding', $config['output_encoding']);
        $container->setParameter('funstaff.tika.config.logging', $config['logging']);
    }
}
