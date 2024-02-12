<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Create Note';
$errors = [];

if (!Validator::string($_POST['title'], 1, 50)) {
    $errors['title'] = '* A valid title of max length 50 characters is required';
}
if (!Validator::string($_POST['body'], 1, 4000)) {
    $errors['body'] = '* A valid body of max length 4000 characters is required';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => $heading,
        'errors'=> $errors
    ]);
}

$query = 'insert into `notes` (`title`, `body`, `user_id`) values(:title, :body, :user_id)';
$notes = $db->query($query, [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'user_id' => 1
]);
header('Location: /notes');
die();
