<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_keluhan();
  
}

if (isset($_POST['hapus_keluhan'])) {
  hapus_keluhan();
}
  


if (isset($_POST['balas'])) {
  $id = $_POST['id'];
  $id_pelanggan = $_POST['id_pelanggan'];

  update_rating_admin($id, $id_pelanggan);
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
           <h3 class="col-sm-6">Rating & Ulasan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rating & Ulasan</li>
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

<!-- Modal -->

<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">
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
                                                <th>Rating</th>
                                                <th>Ulasan</th> <!-- isinya validasi dan tombol lihat balasan -->
                                                <th>Admin</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>

                                          <?php 

                                          $no = 1;

                                          foreach (select_rating() as $rng):
                                           ?>
                                         
                                           <tr>
                                              <td><?=$no++;?></td>
                                              <td>
                                                <?php 

                                                for ($i=0; $i < $rng['rating']; $i++) { 
                                                  echo "<i class='fa fa-star'></i>";
                                                }

                                                 ?>
                                              </td>
                                              <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihatUlasan<?=$rng['id'];?>">
                                                  Lihat Ulasan
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="lihatUlasan<?=$rng['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Ulasan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="form-group">
                                                          <textarea class="form-control" readonly=""><?=$rng['ulasan'];?></textarea>
                                                        </div>

                                                        <form action="" method="POST">
                                                          <input type="text" value="<?=$rng['id'];?>" hidden name="id">
                                                          <input type="text" value="<?=$rng['id_pelanggan'];?>" hidden name="id_pelanggan">
                                                          <label>Balasan</label>
                                                          <textarea class="form-control" name="balasan"><?=$rng['balasan']?></textarea>
                                                        
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="balas" class="btn btn-primary">Balas</button>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                </td>
                                              <td><?=$rng['admin']?></td>
                                              <td>
                                               
                                               <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusUlasan<?=$rng['id'];?>">
                                                  <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapusUlasan<?=$rng['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Ulasan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="form-group">
                                                          <p>Apakah anda yakin ingin menghapus rating ini ?</p>
                                                        </div>

                                                        <form action="" method="POST">
                                                          <input type="text" value="<?=$rng['id'];?>" hidden name="id">
                                                        
                                                         
                                                        
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="hapus" class="btn btn-primary">hapus</button>
                                                        </form>
                                                      </div>
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
