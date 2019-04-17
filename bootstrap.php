<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
use Dotenv\Loader;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__ . '/docker');
$dotenv->load();

$config = Setup::createAnnotationMetadataConfiguration([(__DIR__."/src")], true);
$conn = [
    'dbname' => 'taxsure',
    'user' => 'root',
    'password' => getenv('MYSQL_ROOT_PW'),
    'host' => 'mysql',
    'driver' => 'pdo_mysql'
];

$entityManager = EntityManager::create($conn, $config);
