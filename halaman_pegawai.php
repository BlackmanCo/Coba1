
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cssadmin.css">
</head>
<body>
<script type="text/javascript">
	alert ("Halo <?php echo $_SESSION['username']; ?>, Anda telah login sebagai <?php echo $_SESSION['level']; ?> ")
</script>
<?php 
require ("koneksi.php");

$hub = open_connection();
read_data();
mysqli_close($hub);
?>
<?php 
function read_data()
{
	global $hub;
	$query = "select * from dt_prodi";
	$result = mysqli_query($hub, $query);
?>

<h2> Data Program Studi <hr color = "white"></h2>

<div class="container1">
<br><br>
<br><br>
<table border="1" cellpadding="2">
	<tr>
		<td>ID</td>
		<td>KODE</td>
		<td>NAMA PRODI</td>
		<td>AKREDITASI</td>
	</tr>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
	<tr>
		<td><?php echo $row['idprodi']; ?></td>
		<td><?php echo $row['kdprodi']; ?></td>
		<td><?php echo $row['nmprodi']; ?></td>
		<td><?php echo $row['akreditasi']; ?></td>
	</tr>
	<?php } ?>
	</table>
<br>
	<a href="logout.php"> <input type="submit" value="Logout"/>
<?php } ?>
 </div>
</body>
</html>


