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
	$nama = $_POST['nama'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO admins SET username='$username', password='$password', nama='$nama', no_tlp='$no_tlp', alamat='$alamat', foto='$nama_file_baru'");

		}
	}else if (empty($_POST['foto'])) {
		$res = mysqli_query($koneksi, "INSERT INTO admins SET username='$username', password='$password', nama='$nama', no_tlp='$no_tlp', alamat='$alamat'");
	}
	
}

function hapus_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$select = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM admins WHERE id='$id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM admins WHERE id='$id'");
	}
}

function edit_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$no_tlp = $_POST['no_tlp'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];

	// unlink 
	$sql = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id'");
	$r = mysqli_fetch_array($sql);

	$hapus_foto = $r['foto'];

		if(isset($_POST['ubahfoto']))
	{
		if ($row['foto']=="") 
		{
				if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE admins SET username='$username', password='$password', nama='$nama', no_tlp='$no_tlp', alamat='$alamat', foto='$nama_file_baru' WHERE id='$id'");
		      			
		      			
		    }



			}
		}else if ($row['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE admins SET username='$username', password='$password', nama='$nama', no_tlp='$no_tlp', alamat='$alamat', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("img/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE admins SET username='$username', password='$password', nama='$nama', no_tlp='$no_tlp', alamat='$alamat' WHERE id='$id'");
	}


}

// ---------------------------------------------KELUHAN SECTION------------------------------------------------------------
function select_keluhan(){
	global $koneksi;

	return mysqli_query($koneksi, "SELECT * FROM keluhans");
}


function update_keluhan(){
	global $koneksi;

	$tanggapan = $_POST['tanggapan'];
	$kd_keluhan = $_POST['kd_keluhan'];
	$id_pelanggan = $_POST['id_pelanggan'];

	date_default_timezone_set("Asia/Jakarta");
	$waktu_tanggapan = date("d-m-Y H:i");


	// select admin
	$id_admin = $_SESSION['idtuyul'];

	$select_admin = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id_admin'");

	$row = mysqli_fetch_array($select_admin);

	$nama_admin = $row['nama'];

	echo $nama_admin;

	$update_q = mysqli_query($koneksi, "UPDATE keluhans SET waktu_tanggapan='$waktu_tanggapan', tanggapan='$tanggapan', admin='$nama_admin' WHERE kd_keluhan='$kd_keluhan' AND id_pelanggan='$id_pelanggan'");;

	if ($update_q) {
		echo "<script>alert('sukses memberi tanggapan!')</script>";
	}else{
		echo "<script>alert('gagal memberi tanggapan!')</script>";
	}


}

// rating sectio

function select_rating()
{
	global $koneksi;

	return mysqli_query($koneksi, "SELECT * FROM ratings ORDER BY id");
}

function update_rating_admin($id1, $id2)
{
	global $koneksi;
	$id = $id1;
	$id_pelanggan = $id2;

	$balasan = $_POST['balasan'];

	$id_admin = $_SESSION['idtuyul'];

	$select_a = mysqli_query($koneksi, "SELECT * FROM admins WHERE id='$id_admin'");
	$row = mysqli_fetch_array($select_a);

	$admin = $row['nama'];

	date_default_timezone_set("Asia/Jakarta");
	$tgl_balasan = date("d-m-Y H:i");

	$update_q = mysqli_query($koneksi, "UPDATE ratings SET balasan='$balasan', tgl_balasan='$tgl_balasan', admin='$admin' WHERE id='$id' AND id_pelanggan='$id_pelanggan'");
	if ($update_q) {
		echo "<script>alert('Balas rating sukses')</script>";
	}else{
		echo "<script>alert('Kegagalan dalam membalas rating')</script>";
	}
}

function hapus_rating($id1)
{
	global $koneksi;

	return mysqli_query($koneksi, "DELETE FROM ratings WHERE id='$id1'");
}

// saran section
function select_saran()
{
	global $koneksi;

	return mysqli_query($koneksi, "SELECT * FROM sarans ORDER BY id");
}

function hapus_saran()
{
    global $koneksi;
    $id = $_POST['id'];
    
    return mysqli_query($koneksi, "DELETE FROM sarans where id = '$id'");
}

// statistic section
function select_admin_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM admins");
	$r = mysqli_fetch_array($select);
	echo $r['jadmin'];
}

function stat_keluhan1()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jkeluhan FROM keluhans");
	$r = mysqli_fetch_array($select);
	echo $r['jkeluhan'];
}

function stat_keluhan2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jkeluhan1 FROM keluhans WHERE tanggapan != ''");
	$r = mysqli_fetch_array($select);
	echo $r['jkeluhan1'];
}

function stat_rating()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jrating FROM ratings");
	$r = mysqli_fetch_array($select);
	echo $r['jrating'];
}

function stat_saran()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jsaran FROM sarans");
	$r = mysqli_fetch_array($select);
	echo $r['jsaran'];
}


// Tentang kami section

function select_tentang()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_tentang_kami");
} 

function insert_tentang()
{
	global $koneksi;
	$tentang_kami = $_POST['tentang_kami'];
	$id_admin = $_POST['id_admin'];
	$save = mysqli_query($koneksi, "INSERT INTO tb_tentang_kami SET tentang_kami='$tentang_kami', id_admin='$id_admin'");
}

function hapus_tentang()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_tentang_kami WHERE id ='$id'");
}

// pelanggan section

function query_pelanggan()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM users");
}

function hapus_pelanggan($id){
	global $koneksi;
	$id = $id;
	return mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
}


// product section
function select_product()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_product");
}

function tambah_produk()
{
	global $koneksi;
	$kapasitas = $_POST['kapasitas'];
	$harga = $_POST['harga'];

	$save = mysqli_query($koneksi, "INSERT INTO tb_product SET kapasitas ='$kapasitas', harga='$harga'");
}

function hapus_product()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_product WHERE id='$id'");
}

// kelebihan section
function select_kelebihan()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM kelebihans");
}

function insert_kelebihan()
{
	global $koneksi;
	$title = $_POST['title'];
	$description = $_POST['description'];
	return mysqli_query($koneksi, "INSERT INTO kelebihans SET title='$title', description='$description'");
}

function delete_kelebihan()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM kelebihans WHERE id='$id'");
}


// services section

function select_services()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM services");
}

function insert_services()
{
	global $koneksi;
	$title = $_POST['title'];
	$description = $_POST['description'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO services SET title='$title', description='$description',foto='$nama_file_baru'");

		}
	}
}

function delete_services()
{
	global $koneksi;
	$id = $_POST['id'];
	$select = mysqli_query($koneksi, "SELECT * FROM services WHERE id='$id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM services WHERE id='$id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM services WHERE id='$id'");
	}

}

// intro section

function select_intro()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM intros");
}

function insert_intro()
{
	global $koneksi;
	$description = $_POST['description'];
	$title = $_POST['title'];
	$foto = $_FILES['foto']['name'];	
	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO intros SET title='$title', description='$description',foto='$nama_file_baru'");

		}
	}
}

function hapus_intro()
{
	global $koneksi;
	$id = $_POST['id'];
	$select = mysqli_query($koneksi, "SELECT * FROM intros WHERE id='$id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM intros WHERE id='$id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM intros WHERE id='$id'");
	}
}

// coverage section
function select_coverages()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM coverage");
}

function insert_coverages()
{
	global $koneksi;
	$title = $_POST['title'];
	$description = $_POST['description'];
	return mysqli_query($koneksi, "INSERT INTO coverage SET title='title', description='$description'");
}

function hapus_coverages()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM coverage WHERE id='$id'");
}


// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "../assets/";

}

 ?>