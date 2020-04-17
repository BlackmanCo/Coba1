<?php
$koneksi = mysqli_connect("localhost","root","","akademik");
function open_connection() {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname   = "akademik";
	$koneksi  = mysqli_connect($hostname, $username, $password, $dbname);
	$koneksi = mysqli_connect("localhost","root","","akademik");
	return $koneksi;
}
?>