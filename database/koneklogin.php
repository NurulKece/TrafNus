<?php

$host = "localhost";
$username = "root";
$password = "";
$database_name = "wisata";

$db = mysqli_connect($host, $username, $password, $database_name);

if($db->connect_error){
       echo "koneksi database gagal";
       die("error");
}
?>