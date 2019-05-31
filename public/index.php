<?php
use FINANCE\Application;
use FINANCE\Plugins\RoutePlugin;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());