<?php

require_once __DIR__ . '/AutoloaderClass.php';

use Project\Autoload\AutoloaderClass as Autoloader;

Autoloader::addNamespace('Base', dirname(__DIR__) . '/src/');

Autoloader::register();
