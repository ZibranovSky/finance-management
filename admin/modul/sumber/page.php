<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
    insert_sumbers();
  
}

if (isset($_POST['hapus'])) {
  hapus_sumbers();
}
  


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Sumber Income</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sumber Income</li>
            </ol>
          </div><!-- /.col -->
        </div>
  </div>


  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12"><br>
          <!-- Button trigger modal -->


      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Sumber Income
</button>
      <div class="row">
        <div class="col-sm-12"><br>
          <!-- Button trigger modal -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Sumber Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label>Kode Sumber</label>
            <input type="text" name="kd_sumber" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Tipe Sumber</label>
            <input type="text" name="tipe_sumber" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required="">
          </div>
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->

<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-10">
      <!-- <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                           

                                            $i = 1;
                                            
                                         ?>
                                        <tbody>
                                         
                    </tbody>
                                    </table> -->
                                        <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Sumber</th>
                                                <th>Tipe Sumber</th>
                                                <th>Name</th>
                                                <th>Balance</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Admin</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                          $no = 1;
                                         
                                          foreach (select_sumbers() as $klb):

                                           ?>
                                          <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$klb['kd_sumber'];?></td>
                                          <td><?=$klb['tipe_sumber'];?></td>
                                          <td><?=$klb['name'];?></td>
                                          <td><?=$klb['balance'];?></td>
                                          <td><?=$klb['tgl_masuk'];?></td>
                                          <td><?=$klb['bulan'];?></td>
                                          <td><?=$klb['tahun'];?></td>
                                          <td><?=$klb['admin'];?></td>

                                          
                                          <td>
                                           <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusklb<?=$klb['id'];?>">
                                             <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusklb<?=$klb['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$klb['id'];?>" hidden name="id">

                                                      <p>Anda Yakin Ingin Menghapus Data Ini ?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>

                                            </td>
                                          
                                          </tr>
                                           
                                        <?php endforeach; ?>
                                        </tbody>
                                         
                                    </table>
</div>
  </div>
   
   
<!-- end table -->
  
        </div>  
      </div>
    </div>
  </section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
