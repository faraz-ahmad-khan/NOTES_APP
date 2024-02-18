<?php

use Core\App;
use Core\Database;
use Core\Validator;

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];



if(!Validator::string($fullname, 7, 30)) {
    $errors['fullname'] = '* Please provide a valid name of length no more than 30 characters.';
}
if(!Validator::email($email)) {
    $errors['email'] = '* Please provide a valid email address.';
}
if(!Validator::string($password, 7, 255)) {
    $errors['password'] = '* Password length should be at least 7 characters';
}

if(!empty($errors)) {
    return view('registeration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
    header('location: /');
    exit();
} else {
    $db->query('insert into users(fullname, email, password) values(:fullname, :email, :password)', [
        'fullname' => $fullname,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)  
    ]);
    $user = $db->query('select * from users where email = :email', [
        'email' => $email
    ])->find();

    login($user);

    header('Location: /');
    exit();
}

