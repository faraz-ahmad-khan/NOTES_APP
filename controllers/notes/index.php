<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'My Notes';

$query = 'select * from notes where user_id = :user';
$notes = $db->query($query, [
    'user' => 1
])->get();

view('notes/index.view.php', [
    'heading' => $heading,
    'notes' => $notes
]);