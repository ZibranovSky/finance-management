<?php 
session_start();
include 'sesi.php';
$nama_app = " | TUANI";
$modul =  (isset($_GET['m']))?$_GET['m']:"awal";
switch ($modul) {
	case 'awal': default: $judul = "Dashboard $nama_app"; include 'awal.php'; break;
	case 'admin':  include 'modul/admin/index.php'; break;
	case 'akun': $judul = "Akun $nama_app"; include 'modul/admin/akun.php'; break;
	case 'sumber': include 'modul/sumber/index.php'; break;
	case 'masukan': include 'modul/masukan/index.php'; break;
	case 'keluaran': include 'modul/keluaran/index.php'; break;
	
	case 'rating': include 'modul/rating/index.php'; break;
	case 'saran': include 'modul/saran/index.php'; break;
	case 'tentang': include 'modul/tentang/index.php'; break;
	case 'pelanggan': include 'modul/pelanggan/index.php'; break;
	case 'product': include 'modul/product/index.php'; break;
	case 'kelebihan': include 'modul/kelebihan/index.php'; break;
	case 'services': include 'modul/services/index.php'; break;
	case 'intro': include 'modul/intro/index.php'; break;
	case 'coverage': include 'modul/coverage/index.php'; break;
	;
	
}

 ?>