<?php 

include 'admin/fungsi/fungsi.php';

if (isset($_POST['register'])) {
	global $koneksi;

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// id pelanggan 
	$random_id = rand(1, 10000);

	$id_pelanggan = $random_id;

	$nama = $_POST['nama'];
	$no_tlp = $_POST['no_tlp'];
	$alamat_lengkap = $_POST['alamat_lengkap'];

	// validasi

	$select = mysqli_query($koneksi, "SELECT * FROM users WHERE id_pelanggan='$id_pelanggan'");
	$cek = mysqli_fetch_row($select);

	if ($cek) {
		echo "<script>alert('Data dengan id '".$id_pelanggan."' sudah ada')</script>";
	}else{
		$save = mysqli_query($koneksi, "INSERT INTO users SET username='$username', password='$password', id_pelanggan='$id_pelanggan', nama='$nama', no_tlp='$no_tlp', foto='', alamat_lengkap='$alamat_lengkap'");
		if ($save) {
			echo "<script>alert('Registrasi Sukses, silahkan login')</script>";
			header("location: login.php");
		}else{
			echo "<script>alert('Registrasi gagal')</script>";
		}
	}
	
}

 ?>