<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/services/DB.php';

if (!isset($_SESSION)) {
    session_start();
}

class LoginController
{
    static public function listen()
    {
        if (empty($_POST)) return;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE email = ?";

        $q = $db->prepare($sql);
        $q->execute(array($email));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        DB::disconnect();

        if (is_bool($data)) {
            Flash::flash('error', 'Email atau Password salah, silahkan coba lagi', FLASH_DANGER);
            return;
        }

        $passwordDb = $data['password'];

        if (!password_verify($password, $passwordDb)) {
            Flash::flash('error', 'Email atau Password salah, silahkan coba lagi', FLASH_DANGER);
            return;
        }

        Helpers::redirect('dashboard.php');
    }
}
