<?php

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function penyebut($nilai)
{
    $nilai = intval(abs($nilai));
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";

    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }

    return $temp;
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terbilang</title>

    <link rel="stylesheet" href="./../modul-3/style.css">
</head>

<body>
    <h1>Terbilang - Said 1412 22 0068</h1>
    <form action="./terbilanng.php" id="form-pendaftaran" method="post"></form>
    <table class="table-biodata">
        <tr>
            <td>Angka</td>
            <td>:</td>
            <td>
                <input type="number" name="num1" placeholder="Masukkan Nilai" form="form-pendaftaran" required value="<?= $_POST['num1'] ?? '' ?>">
            </td>
        </tr>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
            <tr>
                <th>Hasil</th>
                <td>:</td>
                <td><?= ucwords(terbilang((int)$_POST['num1'])); ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3" align="right">
                <a href="./index.php">Kembali Main Menu</a>
                <input type="reset" value="Cancel" form="form-pendaftaran">
                <input type="submit" value="Hitung" form="form-pendaftaran">
            </td>
        </tr>
    </table>
</body>

</html>