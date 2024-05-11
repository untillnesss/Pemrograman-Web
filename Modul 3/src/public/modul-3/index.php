<?php

require './MasterData.php';

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
    <form action="./process.php" id="form-pendaftaran" method="post"></form>
    <table class="table-biodata">
        <tr>
            <th>NAMA</th>
            <td>:</td>
            <td>
                <input type="text" name="name" placeholder="Masukkan Nama Kamu" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <th>TEMPAT LAHIR</th>
            <td>:</td>
            <td>
                <input type="text" name="birthPlace" placeholder="Masukkan Tempat Lahir Kamu" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <th>TANGGAL LAHIR</th>
            <td>:</td>
            <td class="flex">
                <input type="date" name="birthDate" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td>:</td>
            <td class="flex gap-20">
                <?php
                foreach (MasterData::gender() as $key => $label) { ?>
                    <div>
                        <input type="radio" name="gender" value="<?= $key ?>" id="<?= $key ?>" form="form-pendaftaran" required> <label for="<?= $key ?>"><?= $label ?></label>
                    </div>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th>ALAMAT</th>
            <td>:</td>
            <td>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Masukkan Alamat Kamu" form="form-pendaftaran" required></textarea>
            </td>
        </tr>
        <tr>
            <th>ASAL SEKOLAH</th>
            <td>:</td>
            <td class="flex gap-20">
                <?php
                foreach (MasterData::jenjangSekolah() as $key => $label) { ?>
                    <div>
                        <input type="radio" name="school" value="<?= $key ?>" id="<?= $key ?>" form="form-pendaftaran" required> <label for="<?= $key ?>"><?= $label ?></label>
                    </div>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="text" name="schoolName" placeholder="Masukkan Nama Sekolah Kamu" form="form-pendaftaran" required>
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
                <input type="number" name="score-mtk" placeholder="Masukkan Nilai" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <td>Bahasa Inggris</td>
            <td>:</td>
            <td>
                <input type="number" name="score-inggris" placeholder="Masukkan Nilai" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <td>Bahasa Indonesia</td>
            <td>:</td>
            <td>
                <input type="number" name="score-indonesia" placeholder="Masukkan Nilai" form="form-pendaftaran" required>
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
                <select name="jurusan-1" id="jurusan-1" form="form-pendaftaran" required>
                    <?php
                    foreach (MasterData::jurusan() as $key => $label) { ?>
                        <option value="<?= $key ?>"><?= $label ?></option>
                    <?php } ?>
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
                <select name="jurusan-2" id="jurusan-2" form="form-pendaftaran" required>
                    <?php
                    foreach (MasterData::jurusan() as $key => $label) { ?>
                        <option value="<?= $key ?>"><?= $label ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>ALASAN MASUK UNIROW</th>
            <td>:</td>
            <td>
                <textarea name="reason" id="reason" cols="30" rows="10" placeholder="Masukkan Alasan Kamu" form="form-pendaftaran" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="checkbox" id="check" form="form-pendaftaran" required><label for="check">Dengan ini Saya menyatakan bahwa data yang diberikan sesuai dengan sebenarnya.</label>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <input type="reset" value="Cancel" form="form-pendaftaran">
                <input type="submit" value="Daftar" form="form-pendaftaran">
            </td>
        </tr>
    </table>
</body>

</html>