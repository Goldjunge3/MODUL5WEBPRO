<?php
include "dbconfig.php";

$sqlStatement = "select * from students";
$query = mysqli_query($conn, $sqlStatement);

$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
foreach ($data as $row) {
    echo $row["nim"]."-".$row["nama_depan"]."-".$row["jenis_kelamin"]."<br>";
}

mysqli_close($conn);



?>