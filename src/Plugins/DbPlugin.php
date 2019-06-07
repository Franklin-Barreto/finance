<?php
declare(strict_types = 1);
namespace FINANCE\Plugins;

use FINANCE\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbPlugin implements PluginInterface {
    
    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include_once __DIR__.'/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();
    }

   
}