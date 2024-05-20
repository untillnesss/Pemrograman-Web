<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/services/DB.php';

if (!isset($_SESSION)) {
    session_start();
}

class RegisterController
{
    static public function listen()
    {
        if (empty($_POST)) return;

        if (strlen($_POST['nama']) < 3) {
            Flash::flash('validation', 'Nama minimal 3 karakter', FLASH_DANGER);
            return;
        }
        if (!Helpers::isValidEmail($_POST['email'])) {
            Flash::flash('validation', 'Email tidak valid', FLASH_DANGER);
            return;
        }
        if (strlen($_POST['password']) < 6) {
            Flash::flash('validation', 'Password minimal 8 karakter', FLASH_DANGER);
            return;
        }
        if ($_POST['password'] != $_POST['password_confirm']) {
            Flash::flash('validation', 'Konfirmasi Password tidak sama dengan Password', FLASH_DANGER);
            return;
        }

        if (self::isEmailRegistered($_POST['email'])) {
            Flash::flash('validation', 'Email sudah terdaftar', FLASH_DANGER);
            return;
        }

        $name = $_POST['nama'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (name, email, password) VALUES(?,?,?)";

        $q = $db->prepare($sql);
        $q->execute(array($name, $email, $password));

        DB::disconnect();

        Flash::flash('successRegister', 'Berhasil mendaftar, silahkan masuk', FLASH_SUCCESS);
        Helpers::redirect('login.php');
    }

    static public function isEmailRegistered($email): bool
    {
        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users where email = ?";

        $q = $db->prepare($sql);
        $q->execute(array($email));

        $data = $q->fetch(PDO::FETCH_ASSOC);

        DB::disconnect();

        if (is_bool($data)) {
            return false;
        }

        return true;
    }
}
