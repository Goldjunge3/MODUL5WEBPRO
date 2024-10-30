<?php 
include "dbconfig.php";

$nim = $_POST["nim"];
$nama_depan = $_POST["nama_depan"];
$kodeprodi = $_POST["kodeprodi"];
$jk = $_POST["jenis_kelamin"];

$sqlStatement = "INSERT INTO students (nim,nama_depan,kodeprodi,jenis_kelamin) VALUES ('$nim','$nama_depan','$kodeprodi','$jk')";
$query = mysqli_query($conn, $sqlStatement);

mysqli_close($conn);

?>
