<?php

class Helpers
{
    static public function redirect($location)
    {
        header('Location: ' . $location);
        exit;
    }

    static function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    static function rupiah($angka)
    {
        if ($angka == null) return 'Rp 0';

        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    static function formatDate($date)
    {
        return date('d F Y', strtotime($date));
    }
}


if(!function_exists('rupiah')) {
	function rupiah($angka) {
		return Helpers::rupiah($angka);
	}
}

if(!function_exists('formatDate')) {
	function formatDate($date) {
		return Helpers::formatDate($date);
	}
}
