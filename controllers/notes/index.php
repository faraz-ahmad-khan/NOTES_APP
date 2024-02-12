<?php
$heading = 'My Notes';
$config = require base_path('config.php');
$db = new Database($config['database']);

$query = 'select * from notes where user_id = :user';
$notes = $db->query($query, [
    'user' => 1
])->get();

// dd(view('notes/index.view.php'));
view('notes/index.view.php', [
    'heading' => $heading,
    'notes' => $notes
]);