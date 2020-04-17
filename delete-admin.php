<?php 
	include "koneksi.php";

	$delete = "DELETE FROM user WHERE id_user='$_GET[id]'";
	mysqli_query($koneksi,$delete);
	echo"<script>window.alert('Berhasil Dihapus'); window.location.href='admin.php#content'</script>";
 ?>