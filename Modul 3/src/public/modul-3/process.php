<?php

require './MasterData.php';
date_default_timezone_set('Asia/Jakarta');

if (empty($_POST)) {
    header("Location: /modul-3/");
    exit();
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folmulir Pendaftaran</title>

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Folmulir Pendaftaran - Said 1412 22 0068</h1>
    <form action="process.php" id="form-pendaftaran" method="post"></form>
    <table class="table-biodata">
        <tr>
            <th>NAMA</th>
            <td>:</td>
            <td>
                <?= $_POST['name'] ?>
            </td>
        </tr>
        <tr>
            <th>TEMPAT LAHIR</th>
            <td>:</td>
            <td>
                <?= $_POST['birthPlace'] ?>
            </td>
        </tr>
        <tr>
            <th>TANGGAL LAHIR</th>
            <td>:</td>
            <td class="flex">
                <?= MasterData::formatDate($_POST['birthDate']) ?>
            </td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td>:</td>
            <td class="flex">
                <?= MasterData::getGender($_POST['gender']) ?>
            </td>
        </tr>
        <tr>
            <th>ALAMAT</th>
            <td>:</td>
            <td>
                <?= $_POST['address'] ?>
            </td>
        </tr>
        <tr>
            <th>ASAL SEKOLAH</th>
            <td>:</td>
            <td class="flex">
                <?= MasterData::getJenjangSekolah($_POST['school']) ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <?= $_POST['schoolName'] ?>
            </td>
        </tr>
        <tr>
            <th>NILAU UAN</th>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Matematika</td>
            <td>:</td>
            <td>
                <?= $_POST['score-mtk'] ?>
            </td>
        </tr>
        <tr>
            <td>Bahasa Inggris</td>
            <td>:</td>
            <td>
                <?= $_POST['score-inggris'] ?>
            </td>
        </tr>
        <tr>
            <td>Bahasa Indonesia</td>
            <td>:</td>
            <td>
                <?= $_POST['score-indonesia'] ?>
            </td>
        </tr>
        <tr>
            <th>JURUSAN YANG DIPILIH</th>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li>Pilihan 1</li>
                </ul>
            </td>
            <td>:</td>
            <td>
                <?= MasterData::getJurusan($_POST['jurusan-1']) ?>
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li>Pilihan 2</li>
                </ul>
            </td>
            <td>:</td>
            <td>
                <?= MasterData::getJurusan($_POST['jurusan-2']) ?>
            </td>
        </tr>
        <tr>
            <th>ALASAN MASUK UNIROW</th>
            <td>:</td>
            <td>
                <?= $_POST['reason'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h2>TANGGAL DAFTAR: <?= date('d F Y - h:i:s'); ?></h2>
            </td>
        </tr>
    </table>
</body>

</html>