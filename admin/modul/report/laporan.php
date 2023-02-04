<?php 
include 'fungsi/fungsi.php';
global $koneksi;

$id_admin = $_GET['id_admin'];
$bulan = $_GET['bulan'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuangan</title>
	   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

      <link href="<?=url()?>css/w3.css" rel="stylesheet" media="all">
    <link href="<?=url()?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- ICON -->
    <link rel="icon" href="<?=url()?>images/logo_absensi.png" type="image/png">
    <!-- Bootstrap CSS-->
    <link href="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- <?=url()?>Vendor CSS-->
    <link href="<?=url()?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

      <!-- Main CSS-->
    <link href="<?=url()?>css/theme.css" rel="stylesheet" media="all">

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


</head>

<body>

<div class="container">
	<center>
		<section class="mt-5">
			<p>Laporan Keuangan</p>
			<p>Income & Outcome</p>
			<hr width="50%" style="height: 10px;">
		</section>
	</center>

	<div class="row">
		<strong><p>Bulan : </p> <?=$bulan;?></strong>
	</div>
</div>


</body>
</html>