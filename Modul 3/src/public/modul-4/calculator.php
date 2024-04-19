<?php

function calculate()
{
    $num1 = (float)$_POST['num1'];
    $num2 = (float)$_POST['num2'];
    $operator = $_POST['operator'];

    return match ($operator) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        'x' => $num1 * $num2,
        ':' => $num1 / $num2,
    };
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Sederhana</title>

    <link rel="stylesheet" href="./../modul-3/style.css">
</head>

<body>
    <h1>Perhitungan Sederhana - Said 1412 22 0068</h1>
    <form action="./calculator.php" id="form-pendaftaran" method="post"></form>
    <table class="table-biodata">
        <tr>
            <td>Bilangan 1</td>
            <td>:</td>
            <td>
                <input type="number" name="num1" placeholder="Masukkan Nilai" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <td>Bilangan 2</td>
            <td>:</td>
            <td>
                <input type="number" name="num2" placeholder="Masukkan Nilai" form="form-pendaftaran" required>
            </td>
        </tr>
        <tr>
            <td>Operator</td>
            <td>:</td>
            <td>
                <select name="operator" id="operator" form="form-pendaftaran" required>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="x">x</option>
                    <option value=":">:</option>
                </select>
            </td>
        </tr>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
            <tr>
                <th>Hasil</th>
                <td>:</td>
                <td><?= calculate(); ?></td>
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