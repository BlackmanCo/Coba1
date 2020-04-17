<?php 
require ('koneksi.php');
$hub = open_connection();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman &mdash; Admin</title>
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

		<div class="header">
			<div class="row">
				<div class="nav">
					<ul>
						<li>
							<a href="halaman_admin.php">HOME</a>
							<a href="admin.php" style="color: MediumTurquoise;">USERS</a>
							<a href="logout.php"><button class="btn-logout">Log Out</button></a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div id="content">
			<div class="row">
				<h2>ADMIN</h2>
			</div>
			<div class="row">
				<button class="btn-add" onclick="location.href='#form-input'">ADD USER</button>
				<form action="" method="POST" class="form-search">
					<input type="search" name="search" placeholder="Search..">
					<input type="submit" name="submit">
				</form>
			</div>
			<div class="data">
				<div class="row" style="max-height: 800px; max-width: 1220px; overflow: auto; margin-top: 5px; margin-bottom: 10px;">
					<table>
						<tr>
							<th width="50">No</th>
							<th width="200">Pengguna</th>
							<th width="180">Username</th>
							<th width="150">Password</th>
							<th width="250">Alamat</th>
							<th width="150">Telepon</th>
							<th width="100">Gender</th>
							<th width="150">Level</th>
							<th width="100">Opsi</th>
						</tr>
						<?php 
							global $hub;

							$search = @$_POST['search'];
							$submit = @$_POST['submit'];
							if($submit){
								$tampil = "SELECT * FROM user WHERE nama LIKE '%$search%' OR username LIKE '%$search%' OR alamat LIKE '%$search%' OR telepon LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR level LIKE '%$search%' ORDER BY nama ASC";
								$hasil  = mysqli_query($koneksi,$tampil);
							}else{
								$tampil = "SELECT * FROM user ORDER BY nama ASC";
								$hasil  = mysqli_query($koneksi,$tampil);
							}
							$no=1;
							while($row = mysqli_fetch_array($hasil))
							{
						 ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nama'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td><input type="password" class="password" value="<?php echo $row['password'] ?>" disabled></td>
							<td><?php echo $row['alamat'] ?></td>
							<td><?php echo $row['telepon'] ?></td>
							<td><?php echo $row['jenis_kelamin'] ?></td>
							<td><?php echo $row['level'] ?></td>
							<td style="text-align: center;">
								<button class="btn-edit" onclick="location.href='admin.php?id=<?php echo $row['id_user'] ?>#form-edit'"><i class="ti-pencil"></i></button>
								<button class="btn-delete" onclick="location.href='admin.php?id=<?php echo $row['id_user'] ?>#form-delete'"><i class="ti-trash"></i></button>
							</td>
						</tr>
						<?php 
							$no++;
							}
						 ?>
					</table>
				</div>
			</div>
		</div>

		<div id="form-input" style="top: 5%;">
			<h4>INPUT</h4>
			<form action="input-admin.php" method="POST">
				<input type="hidden" name="id_user">
				<label>Nama Pengguna</label>
				<input type="text" name="nama" required>
				<label>Username</label>
				<input type="text" name="username" required>
				<label>Password</label>
				<input type="password" name="password" required>
				<label>Alamat</label>
				<input type="text" name="alamat" required>
				<label>Telepon</label>
				<input type="text" name="telepon" required>
				<label>Gender</label>
				<select name="jenis_kelamin">
					<option value="-">-</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				<label>Level</label>
				<select name="level">
					<option value="admin">admin</option>
					<option value="pegawai">pegawai</option>
				</select>
				<button type="submit" class="btn-simpan">SIMPAN</button>
				<button type="reset" class="btn-cancel" onclick="location.href=''">CANCEL</button>
			</form>
		</div>

		<div id="form-edit" style="top: 5%;">
			<?php 
				{
					global $hub;
					$tampil = "SELECT * FROM user WHERE id_user='$_GET[id]'";
					$hasil  = mysqli_query($koneksi,$tampil);
					$u      = mysqli_fetch_array($hasil);
			 ?>
			<h4>UPDATE</h4>
			<form action="update-admin.php?id=<?php echo $u['id_user'] ?>" method="POST">
				<input type="hidden" name="nama">
				<label>Nama User</label>
				<input type="text" name="pengguna" value="<?php echo $u['nama'] ?>" required>
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $u['username'] ?>" required>
				<label>Password</label>
				<input type="password" name="password" value="<?php echo $u['password'] ?>" required>
				<label>Alamat</label>
				<input type="text" name="alamat" value="<?php echo $u['alamat'] ?>" required>
				<label>Telepon</label>
				<input type="text" name="telepon" value="<?php echo $u['telepon'] ?>" required>
				<label>Gender</label>
				<select name="jenis_kelamin">
					<?php $gender = str_replace("", "", $u['jenis_kelamin']) ?>
					<option value="-" <?php if($gender=='-') {echo "selected=\"selected\" ";} else {echo "";} ?>>-</option>
					<option value="Male" <?php if($gender=='Male') {echo "selected=\"selected\" ";} else {echo "";} ?>>Male</option>
					<option value="Female" <?php if($gender=='Female') {echo "selected=\"selected\" ";} else {echo "";} ?>>Female</option>
				<label>Level</label>
				<input type="text" name="level" value="<?php echo $u['level'] ?>" required>
				<button type="submit" class="btn-simpan">UPDATE</button>
				<button type="reset" class="btn-cancel" onclick="location.href=''">CANCEL</button>
			</form>
			<?php 
				} 
			 ?>
		</div>

		<div id="form-delete">
			<?php 
				{
					global $hub;
					$tampil = "SELECT * FROM user WHERE id_user='$_GET[id]'";
					$hasil  = mysqli_query($koneksi,$tampil);
					$r      = mysqli_fetch_array($hasil);
			 ?>
			<h4>DELETE</h4>
			<form action="delete-admin.php?id=<?php echo $r['id_user'] ?>" method="POST">
				<h5><?php echo $r['nama'] ?> ?</h5>
				<button type="submit" class="btn-simpan">DELETE</button>
				<button type="reset" class="btn-cancel" onclick="location.href=''">CANCEL</button>
			</form>
			<?php 
				} 
			 ?>
		</div>
	</div>
</body>
</html>