<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | CRM";
switch ($modul) {
	case 'page': default; $judul="Kelebihan $nama_app"; include 'page.php'; break;
	case 'response': $judul="Respon Kelebihan $nama_app"; include 'response.php'; break;


}



 ?>