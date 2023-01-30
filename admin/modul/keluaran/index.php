<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | TUANI";
switch ($modul) {
	case 'page': default; $judul="Keluaran $nama_app"; include 'page.php'; break;


}



 ?>