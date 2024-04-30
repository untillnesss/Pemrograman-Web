<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';

if (!isset($_SESSION)) {
    session_start();
}

class Auth
{
    static public function setAuth($userId)
    {
        $_SESSION['userId'] = $userId;
        $_SESSION['state'] = 'login';
    }

    static public function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['state']);
    }

    static public function getUserId(): string | int
    {
        return $_SESSION['userId'] ?? 0;
    }

    static public function isLogin(): bool
    {
        return isset($_SESSION['state']);
    }

    static public function requireLogin()
    {
        if (!self::isLogin()) {
            Flash::flash('error', 'Anda harus masuk terlebih dahulu!', FLASH_DANGER);
            Helpers::redirect('login.php');
            exit;
        }
    }

    static public function requireGuest()
    {
        if (self::isLogin()) {
            Helpers::redirect('dashboard.php');
            exit;
        }
    }
}
