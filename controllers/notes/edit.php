<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Edit Note';
$currentUserId = 1;

$query = 'select * from notes where id = :id';
$note = $db->query($query, [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);

view('notes/edit.view.php', [
    'heading' => $heading,
    'errors' => [],
    'note' => $note
]);