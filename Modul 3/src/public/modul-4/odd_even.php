<?php

function oddEven($nilai)
{
    if ($nilai % 2 == 0) {
        return 'GENAP';
    }

    return 'GANJIL';
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganjil Genap</title>

    <link rel="stylesheet" href="./../modul-3/style.css">
</head>

<body>
    <h1>Ganjil Genap - Said 1412 22 0068</h1>
    <form action="./odd_even.php" id="form-pendaftaran" method="post"></form>
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
                <td><?= ucwords(oddEven((int)$_POST['num1'])); ?></td>
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
