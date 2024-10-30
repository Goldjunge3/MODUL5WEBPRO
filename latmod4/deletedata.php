<?php
include "dbconfig.php";

$nim = $_GET["nim"];

$sqlStatement = "Delete FROM students WHERE nim = '$nim'";
$query = mysqli_query($conn, $sqlStatement);

mysqli_close($conn);
?>