<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan_prd'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_services();
  
}

if (isset($_POST['hapus_prd'])) {
  delete_services();
}
  


if (isset($_POST['hapus'])) {
  $id = $_POST['id'];
  
  hapus_rating($id);
}

 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Laporan pendapatan / pengeluaran</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div><!-- /.col -->
        </div>
  </div>


  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12"><br>
        <table class="table-responsive table-borderless table-earning">
				<tbody>
          <form action="" method="POST">
					<tr>
					<td>Bulan : </td>
					<td>
            <select name="bulan" required id="" class="form-control">
              <option value="--">--</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </td>
          
          
					</tr>

          <tr>
          <td>
              <label for="">Tahun : </label>
          </td>
          <td>
            <input type="number" required class="form-control" name="tahun">
          </td>

          </tr>

          <tr>
          <td>
              <label for="">Tipe Laporan : </label>
          </td>
          <td>
            <select name="tipe_laporan" required id="" class="form-control">
            <option value="--">--</option>
              <option value="masukan">Masukan</option>
              <option value="keluaran">Keluaran</option>
            </select>
          </td>

          </tr>

          <tr>
          <td>
            <button type="submit" name="process" class="btn btn-primary">Cari Laporan</button>
          </td>
          </tr>
          </form>
  </tbody>
</table>  

<?php

if (isset($_POST['process'])) {
  global $koneksi;
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
  $tipe_laporan = $_POST['tipe_laporan'];

  
  // id admin

  $id_admin = $adm['id'];

  if ($tipe_laporan == "masukan") {
    $q_masukan = mysqli_query($koneksi, "SELECT sum(nominal) AS jmasukan FROM masukans WHERE bulan='$bulan' AND tahun='$tahun' AND id_admin='$id_admin'");
    $row_masuk = mysqli_fetch_array($q_masukan);
   
  }


}

?>

<?php

if (!isset($_POST['process'])) {
  echo "";
}else{

?>

<table class="table-responsive table-borderless table-earning">
  <tr>
    <td>Jumlah Masukkan</td>
    <td><p><?= rupiah($row_masuk['jmasukan']);?></p></td>
  </tr>
</table>



<?php } ?>

<!-- Button trigger modal -->

<!-- Modal -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Tambah Services
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" required name="title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" required name="description">
          </div>
          <div class="form-group">
            <label>Foto / Gambar</label>
            <input type="file" class="form-control" required name="foto">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_prd" class="btn btn-primary">Tambah Data</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">

  </div>
   
   
<!-- end table -->
  
        </div>  
      </div>
    </div>
  </section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
