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

 
</div>


<div class="container mt-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sumber Saldo</th>
      <th scope="col">Jumlah Saldo</th>
    </tr>
  </thead>
  <tbody>
      <?php
        global $koneksi;
        $cek_saldo = mysqli_query($koneksi, "SELECT * FROM sumbers WHERE bulan='$bulan' AND tahun='$tahun' AND id_admin='$id_admin'");
        
        foreach($cek_saldo as $saldo): 
     ?>
    <tr>
      <th scope="row">1</th>
      <td><strong><?= $saldo['name']; ?></strong></td>
      <td><strong><?=rupiah($saldo['balance']);?></strong></td>
    </tr>

      <?php endforeach; ?>
   
  </tbody>
</table>
</div>

<div class="container mt-5">
        <center>Laporan Pemasukkan</center>
    <section class="mt-5">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Sumber</th>
      <th scope="col">Jumlah Masuk</th>
      <th scope="col">Tanggal Masuk</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    global $koneksi;
    $select_masuk = mysqli_query($koneksi, "SELECT * FROM masukans WHERE id_admin='$id_admin' AND bulan='$bulan'");

    foreach ($select_masuk as $masuk) {
    
    ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= $masuk['nm_sumber']; ?></td>
      <td><?=rupiah($masuk['nominal']);?></td>
      <td><?= $masuk['tgl_masuk'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    
<div class="row mt-3">
     <div class="col">
      <strong><p>Total Pemasukan Bulan Ini : </p></strong>
    </div>
 <?php 

    global $koneksi;
    $j_masuk = mysqli_query($koneksi, "SELECT SUM(nominal) AS jmasukkan FROM masukans WHERE id_admin='$id_admin' AND bulan='$bulan'");
    $total_masuk = mysqli_fetch_array($j_masuk);

     ?>
    <div class="col-7">
       <strong><?=rupiah($total_masuk['jmasukkan']);?></strong>
         </div>   
</div>

    </section>
</div>


<div class="container mt-5">
        <center>Laporan Keluaran</center>
    <section class="mt-5">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Sumber</th>
      <th scope="col">Agenda</th>
      <th scope="col">Jumlah Keluar</th>
      <th scope="col">Tanggal Keluar</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    global $koneksi;
    $select_keluar = mysqli_query($koneksi, "SELECT * FROM keluarans WHERE id_admin='$id_admin' AND bulan='$bulan'");

    foreach ($select_keluar as $keluar) {
    
    ?>
    <tr>
      <th scope="row"><?= $no++; ?></th>
      <td><?= $keluar['nm_sumber']; ?></td>
      <td><?=$keluar['agenda'];?></td>
      <td><?=rupiah($keluar['nominal_keluar']);?></td>
      <td><?= $keluar['tgl_keluar'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div class="row mt-3">
     <div class="col">
      <strong><p>Total Pengeluaran Bulan Ini : </p></strong>
    </div>
 <?php 

    global $koneksi;
    $j_masuk = mysqli_query($koneksi, "SELECT SUM(nominal_keluar) AS jkeluaran FROM keluarans WHERE id_admin='$id_admin' AND bulan='$bulan'");
    $total_keluar = mysqli_fetch_array($j_masuk);

     ?>
    <div class="col-7">
       <strong><?=rupiah($total_keluar['jkeluaran']);?></strong>
         </div>   
</div>
    </section>
</div>


</body>
</html>