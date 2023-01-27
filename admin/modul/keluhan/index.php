<?php 

include 'sesi.php';
$modul =  (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | CRM";
switch ($modul) {
	case 'page': default; $judul="Keluhan $nama_app"; include 'page.php'; break;
	case 'response': $judul="Respon Keluhan $nama_app"; include 'response.php'; break;


}



 ?>