<?php

$username = isset($_SESSION['user']) ? $_SESSION['user']['fullname'] : ' Guest';

view('index.view.php', [
    'heading' => 'Home',
    'username' => $username
]);

