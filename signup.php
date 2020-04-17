<?php
	include('koneksi.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form &mdash; signup</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/themify-icons.css">
	<style>
		body{
			background-color: white;
		}
		h2{
			color:black;
			position: relative;
			text-align: center;
		}
		table{
			text-align: center;
		}

	</style>
</head>
<body>
<div class="container">
		<div id="contact">
			<div class="row">
				<ul>
					<li>
						<a href="#" class="user"><i class="ti-user"></i>Halo, Anda akan mendaftar akun</a>
						<a href="#facebook.com"><i class="ti-facebook"></i> </a>
						<a href="#twitter.com"><i class="ti-twitter"></i> </a>
						<a href="#instagram.com"><i class="ti-instagram"></i> </a>
						<a href="#email"><i class="ti-email"></i> </a>
					</li>
				</ul>
			</div>
		</div>
</div>
<div id="#form-input" style="top: 5%;">
			<h2>Signup</h2>
			<center><table border="1" cellspacing="3"  cellpadding="5" bgcolor="#dedede" width="400"></center>
			<form action="input_signup.php" method="POST">
				<input type="hidden" name="id_user">
			<tr>
				<td>
				<label>Nama Pengguna</label><br>
				<input type="text" name="nama" required>
				</td><br>
			</tr>
			<tr>
				<td><label>Username</label><br>
				<input type="text" name="username" required>
				</td><br>
			</tr>
			<tr>
				<td><label>Password</label><br>
				<input type="password" name="password" required>
				</td><br>
			</tr>
			<tr>
				<td><label>Alamat</label><br>
				<input type="text" name="alamat" required>
				</td><br>
			</tr>
			<tr>
				<td><label>Telepon</label><br>
				<input type="text" name="telepon" required>
				</td><br>
			</tr>
			<tr>
				<td><label>Gender</label><br>
				<select name="jenis_kelamin">
					<option value="-">-</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				</td>
			</tr>
			<tr>
				<td><label>Level</label><br>
				<select name="level">
					<option value="pegawai">pegawai</option>
				</select></td>
			</tr>
			<tr>
				<td><button type="submit" class="btn-simpan">SIMPAN</button>
				<button type="reset" class="btn-cancel" onclick="location.href='index.php'">CANCEL</button>
				</td>
			</tr>
			</form>
		</table>
		</div>
</body>
</html>