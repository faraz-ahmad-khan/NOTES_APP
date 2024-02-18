<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$collection = new Collection([
    'one', 'two', 'three', 'four'
]);

if($collection->contains('three')) {
    die('It contains three');
};