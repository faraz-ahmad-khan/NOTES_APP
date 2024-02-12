<?php
require base_path('Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';
$errors =[];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!Validator::string($_POST['title'], 1, 50)){
        $errors['title'] = '* A valid title of max length 50 characters is required';
    }
    if(!Validator::string($_POST['body'], 1, 2000)){
        $errors['body'] = '* A valid body of max length 2000 characters is required';
    }
    if(empty($errors)){
        $query = 'insert into `notes` (`title`, `body`, `user_id`) values(:title, :body, :user_id)';
        $notes = $db->query($query, [
        'title' => $_POST['title'],
        'body'=> $_POST['body'],
        'user_id' => 1
        ]);
        header('Location: /notes');
        exit();
    }

}

view('notes/create.view.php', [
    'heading' => $heading,
    'errors'=> $errors
]);