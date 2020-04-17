<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/themify-icons.css">
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
	?>
	<div class="container">
		<div id="contact">
			<div class="row">
				<ul>
					<li>
						<a href="#" class="user"><i class="ti-user"></i>&nbsp;Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level'];?></a>
						<a href="#facebook.com"><i class="ti-facebook"></i> </a>
						<a href="#twitter.com"><i class="ti-twitter"></i> </a>
						<a href="#instagram.com"><i class="ti-instagram"></i> </a>
						<a href="#email"><i class="ti-email"></i> </a>
					</li>
				</ul>
			</div>
		</div>
	</div>

<div class="header">
			<div class="row">
				<div class="nav">
					<ul>
						<li>
							<a href="admin.php" style="color: MediumTurquoise;">HOME</a>
							<a href="admin.php">USERS</a>
							<a href="logout.php"><button class="btn-logout">Log Out</button></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	

</body>
</html>

<html>
<head>
	<title>CURD Program Studi</title>
	<link rel="stylesheet" type="text/css" href="coba.css">
</head>
<body>
	
	<!-- bagian header template -->
	<header>
		<h1 class="judul">Politeknik Negeri Lampung</h1>
	</header>
	<!-- akhir bagian header template -->
	
	<div class="wrap">
		<!-- bagian menu		 -->
<!-- bagian sidebar website -->
		<aside class="sidebar">
			<div class="widget">
				<h2>POLINELA</h2>
				<a href="#1">Data Jurusan</a><br>
				<a href="halaman_admin.php">Data Prodi</a><br>
				<a href="#3">Data Mahasiswa</a><br>
				<a href="#4">Data Dosen</a><br>
				<a href="#5">Data Karyawan</a><br>
			</div>
			
		</aside>
		<!-- akhir bagian sidebar website -->

		<!-- bagian konten Blog -->
		<div class="blog">
			<div class="conteudo">
				<div class="post-info">
				</div><br><br>
				<?php
require("koneksi.php");

$hub = open_connection();
$a = @$_GET["a"];
$id = @$_GET["id"];
$sql = @$_POST["sql"];
switch ($sql) {
	case 'create':
		# code...
	create_prodi();
		break;
		case 'update':
		# code...
	update_prodi();
		break;
		case 'delete':
		# code...
	delete_prodi();
		break;
	}
	switch ($a) {
		case 'list':
			# code...
		read_data();
			break;

		case 'input':
			# code...
		input_data();
			break;

		case 'edit':
				# code...
		edit_data($id);
			break;
			
		case 'delete':
				# code...
		delete_data($id);
			break;
		default:
			# code...
		read_data();
			break;
	}
mysqli_close($hub);
?>


<?php
function read_data()
{
	global $hub;
	$query = "select * from dt_prodi";
	$result = mysqli_query($hub, $query);?>

	<h2>Data Program Studi</h2>
	<table border="1" cellpadding="2" bgcolor="cyan";>
	<tr>
		<td colspan="6"><a href="halaman_admin.php?a=input"><input type="submit" name="action" value="Input"></a></td>
	</tr>
		<tr class="re">
			<td>ID</td>
			<td>KODE</td>
			<td>NAMA PRODI</td>
			<td>AKREDITASI</td>
			<td>AKSI</td>
		</tr>
<?php while ($row=mysqli_fetch_array($result)) {?>
	<tr>
	<td><?php echo $row['idprodi'];?></td>
	<td><?php echo $row['kdprodi'];?></td>
	<td><?php echo $row['nmprodi'];?></td>
	<td><?php echo $row['akreditasi'];?></td>
	<td>
		<a href="halaman_admin.php?a=edit&id=<?php echo $row['idprodi'];?>"><input type="submit" name="action" value="Edit"></a>
		<a href="halaman_admin.php?a=delete&id=<?php echo $row['idprodi'];?>"><input type="submit" name="action" value="Delete"></a>
	</td>
	</tr>
	<?php } ?>
	</table>
	<?php } ?>

<?php
function input_data() {
	$row = array(
		"kdprodi"=> "",
		"nmprodi"=> "",
		"akreditasi"=> "-"
		); ?>

<h2>Input Data Program Studi</h2>
<form action="halaman_admin.php?a=list" method="post">
<input type="hidden" name="sql" value="create">
Kode Prodi&nbsp;
<input type="text" name="kdprodi" maxlength="6" size="6" value="<?php echo trim($row["kdprodi"]); ?>"/>

<br>
<br>
Nama Prodi
<input type="text" name="nmprodi" maxlength="70" size="70" value="<?php echo trim($row["nmprodi"]); ?>"/>

<br>
<br>
Akreditasi Prodi
<input type="radio" name="akreditasi" value="-"
<?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >-

<input type="radio" name="akreditasi" value="A"
<?php if ($row["akreditasi"]=='A'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >A

<input type="radio" name="akreditasi" value="B"
<?php if ($row["akreditasi"]=='B') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >B

<input type="radio" name="akreditasi" value="C"
<?php if ($row["akreditasi"]=='C') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >C

<br>
<br>

<input type="submit" name="action" value="Save">
</form>

<?php } ?>



<?php
function edit_data($id){
global $hub;
$query = "select * from dt_prodi where idprodi = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>


<h2>Edit Data Program Studi</h2>
<form action="halaman_admin.php?a=list" method="post">
<input type="hidden" name="sql" value="update">
<input type="hidden" name="idprodi" value="<?php echo trim($id);?>">
Kode Prodi&nbsp;
<input type="text" name="kdprodi" maxlength="6" size="6" value="<?php echo trim($row["kdprodi"]); ?>"/>

<br>
<br>
Nama Prodi
<input type="text" name="nmprodi" maxlength="70" size="70" value="<?php echo trim($row["nmprodi"]); ?>"/>

<br>
<br>
Akreditasi Prodi
<input type="radio" name="akreditasi" value="-"
<?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >-

<input type="radio" name="akreditasi" value="A"
<?php if ($row["akreditasi"]=='A'){
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >A

<input type="radio" name="akreditasi" value="B"
<?php if ($row["akreditasi"]=='B') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >B

<input type="radio" name="akreditasi" value="C"
<?php if ($row["akreditasi"]=='C') {
	# code...
	echo "checked=\"checked\"";}else {echo "";} 
?> >C

<br>
<br>

<input type="submit" name="action" value="Save">
<br><br>
<a href="halaman_admin.php"><button>Back</button></a>

</form>

<?php } ?>

<?php
function delete_data($id){
global $hub;
$query = "select * from dt_prodi where idprodi = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>
<h2><black>Hapus Data Program Studi</black></h2>
<form action="halaman_admin.php?a=list" method="post">
<input type="hidden" name="sql" value="delete">
<input type="hidden" name="idprodi" value="<?php echo trim($id)?>">
<table>
	<tr>
		<td width="100">Kode</td>
		<td><?php echo trim($row["kdprodi"])?></td>
	</tr>
	<tr>
		<td>Nama Prodi</td>
		<td><?php echo trim($row["nmprodi"])?></td>
	</tr>
	<tr>
		<td>Akreditasi</td>
		<td><?php echo trim($row["akreditasi"])?></td>
	</tr>

</table>
<br>
<br>

<input type="submit" name="action" value="Delete">
<br><br>
<a href="halaman_admin.php"><button>Back</button></a>

</form>

<?php } ?>





<?php
function create_prodi()
{
global $hub;
global $_POST;
$query = "insert into dt_prodi (kdprodi,nmprodi,akreditasi) values";
$query.="('".$_POST["kdprodi"]."','".$_POST["nmprodi"]."','".$_POST["akreditasi"]."')";

mysqli_query($hub, $query) or die(mysql_error());
}
?>


<?php
function update_prodi(){
	global $hub;
	global $_POST;
	$query = "update dt_prodi";
	$query .=" SET kdprodi='" .$_POST["kdprodi"]."', nmprodi='".$_POST["nmprodi"]."', akreditasi='".$_POST["akreditasi"]."'";
	$query .= " where idprodi = ".$_POST["idprodi"];

mysqli_query($hub, $query) or die(mysql_error());
}
?>

<?php
function delete_prodi(){
	global $hub;
	global $_POST;
	$query = " delete from dt_prodi";
	$query .= " where idprodi = ".$_POST["idprodi"];

mysqli_query($hub, $query) or die(mysql_error());
}
?>
			</div>
		</div>
		<!-- akhir bagian konten Blog -->
	</div>
</body>
</html>
</body>
</html>