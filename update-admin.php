<?php 
	include "koneksi.php";

	$nama 	= $_POST['nama'];
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	$alamat			= $_POST['alamat'];
	$telepon		= $_POST['telepon'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$level			= $_POST['level'];

	$input = "UPDATE user SET nama='$nama', username='$username', password='$password', alamat='$alamat', telepon='$telepon', jenis_kelamin='$jenis_kelamin', level='$level' WHERE id_user='$_GET[id]' ";
	mysqli_query($koneksi,$input);
	echo "<script>window.alert('Berhasil Diubah'); window.location.href='admin.php#content'</script>";
 ?>