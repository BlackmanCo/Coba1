<?php
$koneksi = mysqli_connect("localhost","root","","project1");
function open_connection() {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "project1";
	$koneksi  = mysqli_connect($hostname, $username, $password, $dbname);
	return $koneksi;
}
?>