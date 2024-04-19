<?php

class MasterData
{
    static function months()
    {
        return [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
    }

    static function gender()
    {
        return [
            'gender-m' => 'Laki-Laki',
            'gender-f' => 'Perempuan',
        ];
    }

    static function getGender($data)
    {
        return MasterData::gender()[$data] ?? '-';
    }

    static function jenjangSekolah()
    {
        return [
            'school-sma' => 'SMA',
            'school-smk' => 'SMK',
            'school-ma' => 'MA',
        ];
    }

    static function getJenjangSekolah($data)
    {
        return MasterData::jenjangSekolah()[$data] ?? '-';
    }

    static function jurusan()
    {
        return [
            'tif' => 'Teknik Informatika',
            'ti' => 'Teknik Industri',
            'pd' => 'Pendidikan',
        ];
    }

    static function getJurusan($data)
    {
        return MasterData::jurusan()[$data] ?? '-';
    }

    static function formatDate($data)
    {
        $date = date_create($data);
        return date_format($date, 'd F Y');
    }
}
