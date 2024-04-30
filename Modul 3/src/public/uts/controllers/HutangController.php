<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Flash.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/services/DB.php';

if (!isset($_SESSION)) {
    session_start();
}

class HutangController
{
    static public function store()
    {
        if (empty($_POST)) return;

        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO debts (name, amount, is_settled, description, date, user_id) VALUES(:name, :amount, :is_settled, :description, :date, :user_id)";

        $q = $db->prepare($sql);
        $q->execute([
            'name' => $name,
            'amount' => $amount,
            'is_settled' => 0,
            'description' => $description,
            'date' => $date,
            'user_id' => Auth::getUserId(),
        ]);

        DB::disconnect();

        Flash::flash('flash', 'Berhasil menambahkan hutang', FLASH_SUCCESS);
        Helpers::redirect('dashboard.php');
    }
}
