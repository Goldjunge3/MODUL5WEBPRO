<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4</title>
</head>
<body>
    
<?php 
//inisialisasi data buku
$buku = [
    ["judul" => "Berserk","penulis"=> "Miura Kentaro","tanggal" => date("12-16-2024")],
    ["judul"=> "Oswald","penulis"=> "Walt Disney","tanggal" => date("02-26-2004")]
];

//fungsi menampilkan data buku
function viewBuku($buku) {
    foreach ($buku as $item) {
        echo"<tr>";
        echo"<td>" . $item["judul"] ."</td>";
        echo "<td>". $item["penulis"] ."</td>";
        echo "<td>". $item["tanggal"] ."</td>";
        echo"</tr>";
    }
}

//fungsi menambah data buku
function insertBuku(&$buku,$judul,$penulis,$tanggal) {
    $newBuku = [
        "judul"=> $judul,
        "penulis"=> $penulis,
        "tanggal" => $tanggal
    ];
    array_push($buku,$newBuku);
}

//fungsi pembaruan data buku
function updateBuku(&$buku,$judul,$newData) {
    foreach ($buku as &$item) {
        if ($item["judul"] == $judul) {
            $item = array_merge($item, $newData);
            break;
        }
    }
}

//fungsi hapus data buku
function deleteBuku(&$buku, $judul) {
    foreach ($buku as $index =>$item) {
        if ($item["judul"] == $judul) {
            unset($buku[$index]);
            break;
        }
    }
}

//fungsi cari data buku
function searchBuku($buku,$judul) {
    foreach ($buku as $item) {
        if ($item["judul"] == $judul) {
            echo"<tr>";
            echo "<td>". $item["judul"] ."</td>";
            echo "<td>". $item["penulis"] ."</td>";
            echo "<td>". $item["tanggal"] ."</td>";
            echo "</tr>";
        }
    }
    return null;
}
?>

<form method="post" action="">
    <table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <tr>
        <td><input type="text" name="judul" placeholder="judul" required></td>
        <td><input type="text" name="penulis" placeholder="penulis" required></td>
        <td><input type="date" name="tanggal" placeholder="tanggal" required></td>
    </tr>
    <?php
    if (isset($_POST["submit"])) {
        $judul = $_POST["judul"];
        $penulis = $_POST["penulis"];
        $tanggal = $_POST["tanggal"];

        insertBuku($buku, $judul, $penulis, $tanggal);
        viewBuku($buku);  
    }
    ?>
    </table>
    <input type="submit" name="submit" value="Tambah">

</form>




<!-- Menampilkan data awal -->
<p>Menampilkan Data Awal:</p>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <?php
    viewBuku($buku);
    ?>
</table>
<br><br>

<!-- Tampilan Menambah buku baru -->
<p>Menambah Buku Baru:</p>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <?php
    insertBuku($buku,"One Piece","Eichiro Oda","04-14-2012");
    viewBuku($buku);
    ?>
</table>
<br><br>

<!-- Tampilan Memperbarui buku dengan index ke 2 -->
<p>Memperbarui Buku dengan ID ke-2:</p>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <?php
    updateBuku($buku,"One Piece",["judul"=> "Naruto","penulis"=> "Masashi Kishimoto","tanggal" => "03-11-2022"]);
    viewBuku($buku);
    ?>
</table>
<br><br>

<!-- Tampilan Menghapus Buku dengan Index ke 1 -->
<p>Menghapus Buku dengan ID ke-1:</p>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <?php
    deleteBuku($buku,"Oswald");
    viewBuku($buku);
    ?>
</table>
<br><br>

<!-- Tampilan Mencari Buku dengan kata kunci 'Naruto' -->
<p>Mencari Buku dangan kata kunci 'Naruto':</p>
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
    <?php
    searchBuku($buku,"Naruto");
    ?>
</table>
<br><br>

</body>
</html>