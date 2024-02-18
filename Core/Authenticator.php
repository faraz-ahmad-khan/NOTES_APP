<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $user = $db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'fullname' => $user['fullname'],
                    'email' => $user['email'],
                    'id' => $user['id']
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
