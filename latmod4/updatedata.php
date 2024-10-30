<?php
include "dbconfig.php";

$nim = $_POST["nim"];
$nama_depan = $_POST["nama_depan"];
$kodeprodi = $_POST["kodeprodi"];
$jk = $_POST["jk"];

$sqlStatement = "UPDATE students SET nama_depan='$nama_depan', kodeprodi='$kodeprodi', jk='$jk' WHERE nim='$nim'";
$query = mysqli_query($conn, $sql);

mysqli_close($conn);
?>