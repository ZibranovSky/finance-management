<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | TUANI";
switch ($modul) {
	case 'page': default; $judul="Report $nama_app"; include 'page.php'; break;


}



 ?>