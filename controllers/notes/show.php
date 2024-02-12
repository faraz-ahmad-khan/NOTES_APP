<?php
$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Note';


$query = 'select * from notes where id = :id';
$note = $db->query($query, [
    ':id' => $_GET['id']
    ])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] !== $currentUserId);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);