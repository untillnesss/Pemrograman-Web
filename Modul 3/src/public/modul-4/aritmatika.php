<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aritmatika</title>

    <link rel="stylesheet" href="./../modul-3/style.css">
</head>

<body>
    <h1>Aritmatika - Said 1412 22 0068</h1>
    <form action="./aritmatika.php" id="form-pendaftaran" method="post"></form>
    <table class="table-biodata">
        <tr>
            <td>Baris</td>
            <td>:</td>
            <td>
                <input type="number" name="num1" placeholder="Masukkan Nilai" form="form-pendaftaran" required value="<?= $_POST['num1'] ?? 7?>">
            </td>
        </tr>
        <tr>
            <td>Kolom</td>
            <td>:</td>
            <td>
                <input type="number" name="num2" placeholder="Masukkan Nilai" form="form-pendaftaran" required value="<?= $_POST['num2'] ?? 6?>">
            </td>
        </tr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $baris = (int)$_POST['num1'] ?? 7;
            $kolom = (int)$_POST['num2'] ?? 6;
        } else {
            $baris = 7;
            $kolom = 6;
        }
        ?>
        <tr>
            <th>Hasil</th>
            <td>:</td>
            <td>
                <table border="1">
                    <?php for ($i = 1; $i <= $baris; $i++) { ?>
                        <tr>
                            <?php for ($j = 1; $j <= $kolom; $j++) { ?>
                                <td>
                                    <?= $i . ',' . $j ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
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
