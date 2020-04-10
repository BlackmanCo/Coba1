<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran

$username=$_POST["username"];
$nama=$_POST["nama"];
$alamat=$_POST["alamat"];
$email=$_POST["email"];
$no_hp=$_POST["nohp"];
$password=($_POST["password"]); //untuk password digunakan enskripsi md5


//Query input menginput data kedalam tabel anggota
  $sql="insert into anggota (username,nama,alamat,email,no_hp,password) values
		('$username','$nama','$alamat','$email','$no_hp','$password')";

//Mengeksekusi/menjalankan query diatas
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
		header("location:index.php");		 		
 }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>