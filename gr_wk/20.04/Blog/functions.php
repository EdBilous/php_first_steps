<?php
session_start();

const LOGIN = "login";
const PASSWORD = "password";

function login(array $post)
{
    $check = null;
    if (isset($post['login']) && isset($post['password'])) {
        if ($post['login'] == LOGIN && $post['password'] == PASSWORD) {
            $check = true;
        }
    }

    if ($check) {
        $_SESSION['access'] = true;
        $_SESSION['login'] = $post['login'];
        header('Location: /blog.php');
        exit;
    } else {
        $_SESSION['access'] = false;
        header('Location: /access_denied.php');
        exit;
    }
}