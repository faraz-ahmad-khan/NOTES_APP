<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Note';

$currentUserId = $_SESSION['user']['id'];

$query = 'select * from notes where id = :id';
$note = $db->query($query, [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);
