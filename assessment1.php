<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment</title>
</head>
<body>
    
<?php
$timA = [
    ["nama" => "Andre","power"=> 80,"nomor"=> 1],
    ["nama"=> "Berli","power"=> 75,"nomor"=> 2],
    ["nama"=> "Charlie","power"=> 88,"nomor"=> 3],
    ["nama"=> "Erina","power"=> 95,"nomor" => 4],
    ["nama"=> "Desmond","power"=> 88,"nomor"=> 5],
];

$timB = [
    ["nama"=> "Farah","power"=> 75,"nomor"=> 1],
    ["nama"=> "Gerry","power"=> 89,"nomor" => 2],
    ["nama"=> "Hesti","power"=> 76,"nomor"=> 3],
    ["nama"=> "Indra","power"=> 61,"nomor"=> 4],
    ["nama"=> "Jordan","power"=> 96,"nomor" => 5],
];
?>

<p><strong>Tim A</strong></p>
<table border="1">
    <tr>
        <td>No Petarung</td>
        <td>Nama</td>
        <td>Power Battle</td>
    </tr>
    <?php
    foreach ($timA as $item) {
        echo "<tr>";
        echo "<td>". $item["nomor"] ."</td>";
        echo "<td>". $item["nama"] ."</td>";
        echo "<td>". $item["power"] ."</td>";
        echo "</tr>";
    }
    ?>
</table>

<p><strong>Tim B</strong></p>
<table border="1">
    <tr>
        <td>No Petarung</td>
        <td>Nama</td>
        <td>Power Battle</td>
    </tr>
    <?php
    foreach ($timB as $item) {
        echo "<tr>";
        echo "<td>". $item["nomor"] ."</td>";
        echo "<td>". $item["nama"] ."</td>";
        echo "<td>". $item["power"] ."</td>";
        echo "</tr>";
    }
    ?>
</table>

<br><br>

<form method="post" action="">
    <label for="anggotaA">No Petarung A:</label>
    <input type="number" name="anggotaA" placeholder="Masukkan Nomor Petarung" required>
    <p>VS</p>
    <label for="anggotaB">No Petarung B:</label>
    <input type="number" name="anggotaB" placeholder="Masukkan Nomor Petarung" required>
    <br>
    <input type="submit" name="submit" value="Fight">
</form>

<br>

<?php
if(isset($_POST["submit"])) {
    $anggotaA = $_POST["anggotaA"];
    $anggotaB = $_POST["anggotaB"];
    function cariA($timA,$anggotaA){
        foreach ($timA as $item) {
            if ($item["nomor"] == $anggotaA) {
                return $item;
            }
        } return null;
    }

    function cariB($timB,$anggotaB){
        foreach ($timB as $item) {
            if ($item["nomor"] == $anggotaB) {
                return $item;
            }
        } return null;
    }

    function fight( $timA,$timB){
        if ($timA["power"] > $timB["power"]) {
            echo"Selamat! ". $timA["nama"] ." dari Tim A Menang";
        } elseif ( $timA["power"] < $timB["power"]) {
            echo"Selamat! ". $timB["nama"] ." dari Tim B Menang";
        } else {
            echo"Hasil Seimbang";
        }
    }

    $atimA = cariA($timA,$anggotaA);
    $atimB = cariB($timB,$anggotaB);

    if ($atimA == null) {
        echo "Petarung yang dipilih tidak terdaftar";
    } elseif ($atimB == null) {
        echo "Petarung yang dipilih tidak terdaftar";
    } else {
        fight($atimA,$atimB);
    }
}

?>


</body>
</html>