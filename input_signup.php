<?php 
	include "koneksi.php";

	$id_user		= $_POST['id_user'];
	$nama		 	= $_POST['nama'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	$alamat			= $_POST['alamat'];
	$telepon		= $_POST['telepon'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$level			= $_POST['level'];

	$input = "INSERT INTO user VALUES('$id_user', '$nama', '$username', '$password', '$alamat', '$telepon', '$jenis_kelamin', '$level')";
	mysqli_query($koneksi,$input);
	echo "<script>window.alert('Berhasil Ditambahkan'); window.location.href='index.php'</script>";
 ?>