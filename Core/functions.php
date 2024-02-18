<?php

use Core\Session;
use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function abort($status = 404)
{
    http_response_code($status);
    require base_path("views/$status.php");
    exit();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if ($condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("Location: $path");
    exit();
}
function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}

function login($user)
{
    $_SESSION['user'] = $user;
    session_regenerate_id(true);
}

function logout()
{
    Session::destroy();
}
