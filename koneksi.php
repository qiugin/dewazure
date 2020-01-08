<?php 

$koneksi = mysqli_connect("dewserver.database.windows.net","dewadmin","Dewohat97","yemDB");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>