<?php 

include 'admin/fungsi/fungsi.php';

if (isset($_POST['login'])) {
	global $koneksi;
	$user = $_POST['username'];
	$pass = md5($_POST['password']);

	$select_a = mysqli_query($koneksi, "SELECT * FROM admins WHERE username='$user' AND password='$pass'");
	$fr = mysqli_fetch_array($select_a);
	$cek_a = mysqli_num_rows($select_a);

	if ($cek_a>0) {
		session_start();
	  	$_SESSION['idtuyul'] = $fr['id'];
	  	header('location: admin/index.php?m=awal');
	}else{
		echo "password salah";
		echo "<a href='index.php'>back</a>";
	}
	
}

 ?>