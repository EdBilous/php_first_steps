<?php
require_once 'data.php';
session_start();

const LOGIN = "bilous";
const PASSWORD = "698d51a19d8a121ce581499d7b701668";

function login(array $post)
{
    $check = null;
    if (isset($post['login']) && isset($post['password'])) {
        if ($post['login'] == LOGIN && md5($post['password']) === PASSWORD) {
            $check = true;
        }
    }

    if ($check) {
        $_SESSION['access'] = true;
        $_SESSION['login'] = $post['login'];
        header('Location: /catalog.php');
        exit;
    } else {
        $_SESSION['access'] = false;
        header('Location: /access_denied.php');
        exit;
    }
}

function showUserName() {
    echo isset($_SESSION['login'])?  $_SESSION['login'] :null;
}