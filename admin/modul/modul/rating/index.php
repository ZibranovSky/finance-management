<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | CRM";
switch ($modul) {
	case 'page': default; $judul="Rating $nama_app"; include 'page.php'; break;

}



 ?>