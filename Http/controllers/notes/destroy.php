<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'Note';
$currentUserId = $_SESSION['user']['id'];

$query = 'select * from notes where id = :id';
$note = $db->query($query, [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);


$db->query('delete from notes where id = :id', [
    ':id' => $_POST['id'],
]);
header('Location: /notes');
exit();
