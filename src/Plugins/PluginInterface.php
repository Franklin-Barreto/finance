<?php 

namespace FINANCE\Plugins;

use FINANCE\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}