<?php

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'app',
    'username'  => 'root',
    'password'  => 'action06',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);


$capsule->setAsGlobal();
$capsule->bootEloquent();
