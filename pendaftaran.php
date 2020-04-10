<!DOCTYPE html>
<html>
<head>
	<title>Menu Registrasi</title>
	<link rel="stylesheet" type="text/css" href="styledaftar.css">
</head>
<body>
	
	<div class="kotak_login">
		<p class="tulisan_login">From Pendaftaran<hr></p><br>
		<form action="simpan-pendaftaran.php" method="post">
				
			<p>Username <input type="text" name="username" class="form_login" placeholder="Masukkan Username" required="required"></p>
			<p>Nama <input type="text" name="nama" class="form_login" placeholder="Masukkan Nama" required="required"></p>
			<p>Alamat <textarea name="alamat" rows="5" placeholder="Masukkan Alamat" class="form_login" required="required"></textarea></p>
			<p>Email<input type="email" name="email" class="form_login" placeholder="Masukkan Email" required="required"></p>
			<p>No Hp <input type="text" name="nohp" class="form_login" placeholder="Masukkan No Hp" required="required"></p>
			<p>Password<input type="password" name="password" class="form_login" placeholder="Masukkan password"required="required"></p>
		<input type="submit" class="form_login" value="Daftar">
		<button class="form_login"><a href="logout.php">kembali</button>
</div>			
		</form>
		
		
	</div>
</body>
</html>