<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'My Notes';
$currentUserId = $_SESSION['user']['id'];

$query = 'select * from notes where user_id = :user';
$notes = $db->query($query, [
    'user' => $currentUserId
])->get();

view('notes/index.view.php', [
    'heading' => $heading,
    'notes' => $notes
]);