<?php

require 'MasterData.php';

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folmulir Pendaftaran</title>

    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <h1>Folmulir Pendaftaran - Said 1412 22 0068</h1>
    <table class="table-biodata">
        <tr>
            <th>NAMA</th>
            <td>:</td>
            <td>
                <input type="text" name="name" placeholder="Masukkan Nama Kamu">
            </td>
        </tr>
        <tr>
            <th>TEMPAT LAHIR</th>
            <td>:</td>
            <td>
                <input type="text" name="placeBirth" placeholder="Masukkan Tempat Lahir Kamu">
            </td>
        </tr>
        <tr>
            <th>TANGGAL LAHIR</th>
            <td>:</td>
            <td class="flex">
                <select name="dateBirth">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
                <select name="monthBirth">
                    <?php
                    foreach (MasterData::months() as $index => $month) {
                        echo '<option value="' . $index . '">' . $month . '</option>';
                    }
                    ?>
                </select>
                <select name="yearBirth">
                    <?php
                    for ($i = 1900; $i <= 2100; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td>:</td>
            <td class="flex">
                <input type="radio" name="gender" value="m" id="gender-m"> <label for="gender-m">Laki-laki</label>
                <hr>
                <input type="radio" name="gender" value="f" id="gender-f"> <label for="gender-f">Perempuan</label>
            </td>
        </tr>
        <tr>
            <th>ALAMAT</th>
            <td>:</td>
            <td>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Masukkan Alamat Kamu"></textarea>
            </td>
        </tr>
        <tr>
            <th>ASAL SEKOLAH</th>
            <td>:</td>
            <td class="flex">
                <input type="radio" name="school" value="school-sma" id="school-sma"> <label for="school-sma">SMA</label>
                <hr>
                <input type="radio" name="school" value="school-smk" id="school-smk"> <label for="school-smk">SMK</label>
                <hr>
                <input type="radio" name="school" value="school-ma" id="school-ma"> <label for="school-ma">MA</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="text" name="schoolName" placeholder="Masukkan Nama Sekolah Kamu">
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
                <input type="number" name="score-mtk" placeholder="Masukkan Nilai">
            </td>
        </tr>
        <tr>
            <td>Bahasa Inggris</td>
            <td>:</td>
            <td>
                <input type="number" name="score-inggris" placeholder="Masukkan Nilai">
            </td>
        </tr>
        <tr>
            <td>Bahasa Indonesia</td>
            <td>:</td>
            <td>
                <input type="number" name="score-indonesia" placeholder="Masukkan Nilai">
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
                <select name="jurusan-1" id="jurusan-1">
                    <?php
                    foreach (MasterData::jurusan() as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    }
                    ?>
                </select>
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
                <select name="jurusan-2" id="jurusan-2">
                    <?php
                    foreach (MasterData::jurusan() as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>ALASAN MASUK UNIROW</th>
            <td>:</td>
            <td>
                <textarea name="reason" id="reason" cols="30" rows="10" placeholder="Masukkan Alasan Kamu"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="reset" value="Cancel">
                <input type="submit" value="Daftar">
            </td>
        </tr>
    </table>
</body>

</html>