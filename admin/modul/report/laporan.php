<?php 
include 'fungsi/fungsi.php';
global $koneksi;

$id_admin = $_GET['id_admin'];
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];

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
    <div class="col">
      <strong><p>Bulan</p></strong>
    </div>
    <div class="col-7">
    <strong>

        <?php if ($bulan == "01") {
            echo '<p>Januari</p>';
        }else if ($bulan=="02") {
            echo '<p>Februari</p>';

        }else if ($bulan=="02") {
            echo '<p>Februari</p>';

        } else if ($bulan=="03") {
            echo '<p>Maret</p>';

        } else if ($bulan=="04") {
            echo '<p>April</p>';

        } else if ($bulan=="05") {
            echo '<p>Mei</p>';

        } else if ($bulan=="06") {
            echo '<p>Juni</p>';

        } else if ($bulan=="07") {
            echo '<p>Juli</p>';

        } else if ($bulan=="08") {
            echo '<p>Agustus</p>';

        } else if ($bulan=="09") {
            echo '<p>September</p>';

        } else if ($bulan=="10") {
            echo '<p>Oktober</p>';

        } else if ($bulan=="11") {
            echo '<p>November</p>';

        } else if ($bulan=="12") {
            echo '<p>Desember</p>';

        } 

        ?>

        </strong>
            </div>
        </div>

        <div class="row">
    <div class="col">
      <strong><p>Tahun</p></strong>
    </div>
    <div class="col-7">
       <strong><?=$tahun;?></strong>
         </div>
     </div>

     <div class="row">
    <div class="col">
      <strong><p>Jumlah Saldo</p></strong>
    </div>
    <div class="col-7">
    <?php 
                    
                    global $koneksi;
                    $cek_saldo = mysqli_query($koneksi, "SELECT * FROM sumbers WHERE bulan='$bulan' AND tahun='$tahun' AND id_admin='$id_admin'");
                    $row_saldo = mysqli_fetch_array($cek_saldo);


                    ?>
                    <strong><?=rupiah($row_saldo['balance']);?></strong>
         </div>
     </div>


    <div class="row">
        <p>Total income masuk : </p>

        <?php 
            global $koneksi;
             $q_masukan = mysqli_query($koneksi, "SELECT sum(nominal) AS jmasukan FROM masukans WHERE bulan='$bulan' AND tahun='$tahun' AND id_admin='$id_admin'");
             $row_masuk = mysqli_fetch_array($q_masukan); 
             
             echo rupiah($row_masuk['jmasukan']);           
         ?>

         
    </div>

    <div class="row">
        <p>Total Pengeluaran : </p>

        <?php 
            global $koneksi;
             $q_keluar = mysqli_query($koneksi, "SELECT sum(nominal_keluar) AS jkeluarans FROM keluarans WHERE bulan='$bulan' AND tahun='$tahun' AND id_admin='$id_admin'");
             $row_keluar = mysqli_fetch_array($q_keluar); 
             
             echo rupiah($row_keluar['jkeluarans']);               
         ?>

         
    </div>
</div>


</body>
</html>