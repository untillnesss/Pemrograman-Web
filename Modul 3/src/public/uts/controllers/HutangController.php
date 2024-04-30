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
    static private function getSumHutang($db)
    {
        $sql = 'SELECT 
                SUM(amount) AS total
                FROM debts 
                WHERE is_settled = 0 
                AND user_id = ?
                GROUP BY user_id;';

        $q = $db->prepare($sql);
        $q->execute(array(Auth::getUserId()));

        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data['total'] ?? 0;
    }

    static private function getSumHutangLunas($db)
    {
        $sql = 'SELECT 
                SUM(amount) AS total
                FROM debts 
                WHERE is_settled = 1
                AND user_id = ?
                GROUP BY user_id;';

        $q = $db->prepare($sql);
        $q->execute(array(Auth::getUserId()));

        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data['total'] ?? 0;
    }

    static public function stats()
    {
        $totalHutang = 0;
        $totalHutangLunas = 0;

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $totalHutang = self::getSumHutang($db);
        $totalHutangLunas = self::getSumHutangLunas($db);

        DB::disconnect();

        return [$totalHutang, $totalHutangLunas];
    }

    static public function list()
    {
        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * 
                FROM debts 
                WHERE user_id = ?
                ORDER BY date DESC';

        $q = $db->prepare($sql);
        $q->execute(array(Auth::getUserId()));

        $data = $q->fetchAll(PDO::FETCH_ASSOC);

        DB::disconnect();

        if (is_bool($data)) {
            return [];
        }

        return $data;
    }

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

    static public function prepareUpdate()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            Helpers::redirect('dashboard.php');
            exit;
        }

        $id = $_GET['id'];

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * 
                FROM debts 
                WHERE user_id = ?
                AND id = ?';

        $q = $db->prepare($sql);
        $q->execute(array(Auth::getUserId(), $id));

        $data = $q->fetch(PDO::FETCH_ASSOC);

        DB::disconnect();

        if (is_bool($data)) {
            return [];
        }

        return $data;
    }

    static public function update()
    {
        if (empty($_POST)) return;

        $id = $_POST['id'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE debts 
                SET 
                    name = :name, 
                    amount = :amount,
                    description = :description, 
                    date = :date
                WHERE id = :id';

        $q = $db->prepare($sql);
        $q->execute([
            'name' => $name,
            'amount' => $amount,
            'description' => $description,
            'date' => $date,
            'id' => $id,
        ]);

        DB::disconnect();

        Flash::flash('flash', 'Berhasil mengubah hutang', FLASH_SUCCESS);
        Helpers::redirect('dashboard.php');
    }

    static public function listen()
    {
        if (empty($_POST)) return;

        $action = $_POST['action'];
        $id = $_POST['id'];

        match ($action) {
            'lunas' => self::doLunas($id),
            'hapus' => self::doHapus($id),
            default => function () {
            }
        };
    }

    static private function doLunas($id)
    {
        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE debts 
                SET is_settled = :is_settled 
                WHERE id = :id';

        $q = $db->prepare($sql);
        $q->execute([
            'is_settled' => 1,
            'id' => $id,
        ]);

        DB::disconnect();

        Flash::flash('flash', 'Berhasil melunasi hutang', FLASH_SUCCESS);
        Helpers::redirect('dashboard.php');
    }

    static private function doHapus($id)
    {
        $db = DB::connector();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM debts 
                WHERE id = :id';

        $q = $db->prepare($sql);
        $q->execute([
            'id' => $id,
        ]);

        DB::disconnect();

        Flash::flash('flash', 'Berhasil menghapus hutang', FLASH_SUCCESS);
        Helpers::redirect('dashboard.php');
    }
}
