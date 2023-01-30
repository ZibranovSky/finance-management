<?php 

$koneksi = mysqli_connect('localhost','root','','db_tuani');

// --------------------------------------------ADMIN SECTION-----------------------------------------------------------------------------
function panggil_admin()
{
	global $koneksi;
	$id  = $_SESSION['idtuyul'];
	return mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id'");
}

function select_admin()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM admins ORDER BY id DESC");
}



function simpan_admin()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];



	$res = mysqli_query($koneksi, "INSERT INTO admins SET username='$username', password='$password', name='$name', typeuser='user'");
	
	
}

function hapus_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	
	return mysqli_query($koneksi, "DELETE FROM admins WHERE id='$id'");
	
}

function edit_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];
	
	return  mysqli_query($koneksi, "UPDATE admins SET username='$username', password='$password', name='$name' WHERE id='$id'");
	


}



// statistic section
function select_admin_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM admins");
	$r = mysqli_fetch_array($select);
	echo $r['jadmin'];
}





// sumber section
function select_sumbers()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM sumbers");
}

function insert_sumbers()
{
  global $koneksi;

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");
  $bulan = date("m");
  $tahun = date("Y");

  // if ($bulan=="01") {
  // 	$newMoon = "Januari";
  // }else if ($bulan=="02") {
  // 		$newMoon = "Februari";
  // }else if ($bulan=="03") {
  // 		$newMoon = "Maret";
  // }else if ($bulan=="04") {
  // 		$newMoon = "April";
  // }else if ($bulan=="05") {
  // 		$newMoon = "Mei";
  // }else if ($bulan=="06") {
  // 		$newMoon = "Juni";
  // }else if ($bulan=="07") {
  // 		$newMoon = "Juli";
  // }else if ($bulan=="08") {
  // 		$newMoon = "Agustus";
  // }else if ($bulan=="09") {
  // 		$newMoon = "September";
  // }else if ($bulan=="10") {
  // 		$newMoon = "Oktober";
  // }else if ($bulan=="12") {
  // 		$newMoon = "November";
  // }else if ($bulan=="12") {
  // 		$newMoon = "Desember";
  // }

  	$kd_sumber = $_POST['kd_sumber'];
  	$tipe_sumber = $_POST['tipe_sumber'];
  	$name = $_POST['name'];
  	$balance = $_POST['balance'];

  	// panggil admin

  	$id = $_SESSION['idtuyul'];
  	$adm_sumber = mysqli_query($koneksi, "SELECT * FROM admins WHERE id = '$id'");
  	$row = mysqli_fetch_array($adm_sumber);

  	$admin =  $row['name'];

	return mysqli_query($koneksi, "INSERT INTO sumbers SET kd_sumber='$kd_sumber', tipe_sumber='$tipe_sumber', name='$name', balance=0, tgl_masuk='$tanggalSekarang', bulan='$bulan', tahun='$tahun', id_admin='$id', admin='$admin'");
}

function hapus_sumbers()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM sumbers WHERE id='$id'");
}


// MASUKAN SECTION

function select_masukan()
{
	global $koneksi;

	$id = $_SESSION['idtuyul'];

	return mysqli_query($koneksi, "SELECT * FROM masukans WHERE id_admin='$id'");

}


function insert_masukan()
{
	global $koneksi;

	date_default_timezone_set("Asia/Jakarta");
	$tanggalSekarang = date("d-m-Y");
	$jam2 = date("hi");
	$jamSekarang = date("h:i a");
	$bulan = date("m");
	$tahun = date("Y");

	$kd_sumber = $_POST['kd_sumber'];
	$tipe_sumber = $_POST['tipe_sumber'];
	$nm_sumber = $_POST['nm_sumber'];
	$nominal = $_POST['nominal'];

	$id_admin = $_SESSION['idtuyul'];

	// select admin

	$selec_admin = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id_admin'");
	$row = mysqli_fetch_array($selec_admin);
	$nama_admin = $row['name'];


	// select sumber

	$selec_sumber = mysqli_query($koneksi, "SELECT * FROM sumbers WHERE kd_sumber = '$kd_sumber' AND id_admin='$id_admin'");
	$row_s = mysqli_fetch_array($selec_sumber);
	$balance = $row_s['balance'];

	if ($nominal <= 0) {
		echo '<script>alert("Nominal masuk tidak boleh <= 0 ")</script>';
	}else{
		// Update balance
		
		$new_balance = $nominal + $balance;
		$update_sumber = mysqli_query($koneksi, "UPDATE sumbers SET balance='$new_balance' WHERE kd_sumber = '$kd_sumber' AND id_admin='$id_admin'");

		// // insert masukan
		$insert_masukan = mysqli_query($koneksi, "INSERT INTO masukans SET kd_sumber='$kd_sumber', tipe_sumber='$tipe_sumber', nm_sumber='$nm_sumber', nominal='$nominal', tgl_masuk='$tanggalSekarang', bulan='$bulan', tahun='$tahun', id_admin='$id_admin', admin='$nama_admin'");
	}
	
}


function hapus_masukan()
{
	global $koneksi;
	$id = $_POST['id'];

	return mysqli_query($koneksi, "DELETE FROM masukans WHERE id='$id'");
}


// KELUARAN SECTION

function select_keluaran()
{
	global $koneksi;
	$id_admin = $_SESSION['idtuyul'];
	return mysqli_query($koneksi, "SELECT * FROM keluarans WHERE id_admin='$id_admin'");
}

function insert_keluarans()
{
	global $koneksi;

	date_default_timezone_set("Asia/Jakarta");
	$tanggalSekarang = date("d-m-Y");
	$jam2 = date("hi");
	$jamSekarang = date("h:i a");
	$bulan = date("m");
	$tahun = date("Y");

	$agenda = $_POST['agenda'];
	$kd_sumber = $_POST['kd_sumber'];
	$tipe_sumber = $_POST['tipe_sumber'];
	$nm_sumber = $_POST['nm_sumber'];
	$nominal_keluar = $_POST['nominal_keluar'];
	$keterangan = $_POST['keterangan'];
	$id_admin = $_SESSION['idtuyul'];

	// select admin

	$selec_admin = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id_admin'");
	$row = mysqli_fetch_array($selec_admin);
	$nama_admin = $row['name'];


	// select sumber

	$selec_sumber = mysqli_query($koneksi, "SELECT * FROM sumbers WHERE kd_sumber = '$kd_sumber' AND id_admin='$id_admin'");
	$row_s = mysqli_fetch_array($selec_sumber);
	$balance = $row_s['balance'];

	if ($nominal_keluar <= 0) {
		echo '<script>alert("Nominal masuk tidak boleh <= 0 ")</script>';
	}else{
		// Update balance
		
		$new_balance =  $balance - $nominal_keluar;
		$update_sumber = mysqli_query($koneksi, "UPDATE sumbers SET balance='$new_balance' WHERE kd_sumber = '$kd_sumber' AND id_admin='$id_admin'");

		// // insert masukan
		$insert_masukan = mysqli_query($koneksi, "INSERT INTO keluarans SET agenda='$agenda', tipe_sumber='$tipe_sumber', nm_sumber='$nm_sumber', nominal_keluar='$nominal_keluar', tgl_keluar='$tanggalSekarang', keterangan='$keterangan', bulan='$bulan', tahun='$tahun', id_admin='$id_admin', admin='$nama_admin'");
	}
}


function hapus_keluarans()
{
	global $koneksi;
	$id = $_POST['id'];

	return mysqli_query($koneksi, "DELETE FROM keluarans WHERE id='$id'");
}



// FUNCTION RUPIAH
function rupiah($angka){
	$hasil = "Rp. ". number_format($angka,2,',','.');
	return $hasil;
}


// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "../assets/";

}

 ?>