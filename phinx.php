<?php

use aeCorp\aec_utils\aec_factory\ContainerInterface;

require __DIR__."/aec_public/index.php";

$params = $app->dependancy(ContainerInterface::class)->get("params");

$migrations = [];
$seeds = [];

foreach($app->getAllmodules() as $module){

    if($module::MIGRATION && !empty($module::MIGRATION)) {
        $migrations[] = $module::MIGRATION;
    }
    if($module::SEED && !empty($module::SEED)) {
        $seeds[] = $module::SEED;
    }
}

return
[
    'paths' => [
        'migrations' => $migrations,
        'seeds' => $seeds
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => $params["host"],
            'name' => $params["db"],
            'user' => $params["user"],
            'pass' => $params["mdp"],
            'port' => '3306',
            'charset' => 'utf8'
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $params["host"],
            'name' => $params["db"],
            'user' => $params["user"],
            'pass' => $params["mdp"],
            'port' => '3306',
            'charset' => 'utf8'
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => $params["host"],
            'name' => $params["db"],
            'user' => $params["user"],
            'pass' => $params["mdp"],
            'port' => '3306',
            'charset' => 'utf8'
        ]
    ],
    'version_order' => 'creation'
];
