<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Edit Note';
$currentUserId = 1;

$query = 'select * from notes where id = :id';

$note = $db->query($query, [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);

$errors = [];

if (!Validator::string($_POST['title'], 1, 50)) {
    $errors['title'] = '* A valid title of max length 50 characters is required';
}
if (!Validator::string($_POST['body'], 1, 4000)) {
    $errors['body'] = '* A valid body of max length 4000 characters is required';
}

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => $heading,
        'errors'=> $errors,
        'note' => $note
    ]);
}

$query = 'update notes set title = :title, body = :body where id = :id';

$notes = $db->query($query, [
    ':title' => $_POST['title'],
    ':body' => $_POST['body'],
    ':id' => $_POST['id']
]);
header("Location: /note?id={$_POST['id']}");
die();
