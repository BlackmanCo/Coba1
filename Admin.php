	
<?php
require("koneksi.php");

?>

<link rel="stylesheet" type="text/css" href="cssadmin.css">
<?php
function read_data()
{
	global $hub;
	$query = "select * from dt_prodi";
	$result = mysqli_query($hub, $query);?>

	<h2>Admin Data Prodi <hr color = "white"></h2>

	<div class="container">
	<table border="1" cellpadding="2" class ="">
	<thead>
	<tr>
		<td colspan="4"><a href="Admin.php?a=input"><h4>Input</h4></a></td>
		<td colspan="1"><a href="logout.php"><h4> Logout </h4></a></td>
		
	</tr>
		<tr>
			<td><p>ID</p></td>
			<td><p>KODE</p></td>
			<td><p>NAMA PRODI</p></td>
			<td><p>AKREDITASI</p></td>
			<td><p>AKSI</p></td>
				

	<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
	?>
		</tr>
		</thead>
		<tbody>
			<script type="text/javascript">
	alert ("Halo <?php echo $_SESSION['username']; ?>, Anda telah login sebagai <?php echo $_SESSION['level']; ?> ")
</script>
<?php while ($row=mysqli_fetch_array($result)) {?>
	<tr>
	<td><?php echo $row['idprodi'];?></td>
	<td><?php echo $row['kdprodi'];?></td>
	<td><?php echo $row['nmprodi'];?></td>
	<td><?php echo $row['akreditasi'];?></td>
	<td>
		<a href="Admin.php?a=edit&id=<?php echo $row['idprodi'];?>">EDIT</a>
		<a href="">  |  | </a>
		<a href="Admin.php?a=delete&id=<?php echo $row['idprodi'];?>">HAPUS</a>
	</td>
	</tr>
	</tbody>
	<?php } ?>
	</table>
	<?php } ?>
	</div>

<?php

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

function input_data() {
	$row = array(
		"kdprodi"=> "",
		"nmprodi"=> "",
		"akreditasi"=> "-"
		); ?>
<h2>Input Data Program Studi</h2>
<div class="container1">
<form action="Admin.php?a=list" method="post">
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
	echo "checked=\"checked\"";}else {echo "";} ?> > -
<input type="radio" name="akreditasi" value="A"
<?php if ($row["akreditasi"]=='A'){
	echo "checked=\"checked\"";}else {echo "";} ?> >A
<input type="radio" name="akreditasi" value="B"
<?php if ($row["akreditasi"]=='B') {
	echo "checked=\"checked\"";}else {echo "";} ?> >B
<input type="radio" name="akreditasi" value="C"
<?php if ($row["akreditasi"]=='C') {
	echo "checked=\"checked\"";}else {echo "";} ?> >C
<br>
<br>
<input type="submit" name="action" value="Save">
<a href="Admin.php?a=list">
<input type="button" ... value="Cancel" onclick="history.back();"/>
</form>
</div>
<?php } ?>



<?php
function edit_data($id){
global $hub;
$query = "select * from dt_prodi where idprodi = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>

<h2>Edit Data Program Studi</h2>
<div class="container2">
<form action="Admin.php?a=list" method="post">
<input type="hidden" name="sql" value="update">
<input type="hidden" name="idprodi" value="<?php echo trim($id);?>">

<br>
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
	echo "checked=\"checked\"";}else {echo "";} ?> >-
<input type="radio" name="akreditasi" value="A"
<?php if ($row["akreditasi"]=='A'){
	echo "checked=\"checked\"";}else {echo "";} ?> >A
<input type="radio" name="akreditasi" value="B"
<?php if ($row["akreditasi"]=='B') {
	echo "checked=\"checked\"";}else {echo "";} ?> >B
<input type="radio" name="akreditasi" value="C"
<?php if ($row["akreditasi"]=='C') {
	echo "checked=\"checked\"";}else {echo "";} ?> >C
	<br><br>


<input type="submit" name="action" value="Save">
<a href="Admin.php?a=list">
<input type="button" ... value="Cancel" onclick="history.back();"/>
</form>
<?php } ?>
</tr>
</table>


<?php
function delete_data($id){
global $hub;
$query = "select * from dt_prodi where idprodi = $id";
$result = mysqli_query($hub,$query);
$row = mysqli_fetch_array($result);
?>
<div class="container1">
<form action="Admin.php?a=list" method="post">
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
<a href="Admin.php?a=list">Batal</a>

</form>

<?php } ?>
</div>


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
