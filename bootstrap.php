<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

App::setContainer($container);
App::bind(Database::class, function () {
    $config = require base_path('Config.php');
    return new Database($config['database']);
});