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
  
  hapus_pelanggan($id);
}

 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Pelanggan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
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
                                                <th>Id Pelanggan</th>
                                                <th>Nama</th> <!-- isinya validasi dan tombol lihat balasan -->
                                                <th>No Tlp</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>

                                          <?php 

                                          $no = 1;

                                          foreach (query_pelanggan() as $pln):
                                           ?>
                                         
                                           <tr>
                                              <td><?=$no++;?></td>
                                              <td><?=$pln['id_pelanggan']?></td>
                                              <td><?=$pln['nama']?></td>
                                              <td><?=$pln['no_tlp']?></td>
                                              <td><?=$pln['alamat']?></td>
                                              <td><?php 

                                                if ($adm['foto'] != "") {

                                                 ?>
                                                <img src="../pelanggan/img/<?=$pln['foto'];?>" alt="John Doe" />
                                                <?php 

                                                     }else{

                                                 ?>

                                                 <img src="img/user_logo.png" width="150">

                                               <?php } ?>

                                               </td>
                                              <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus<?=$pln['id'];?>">
                                                  <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modalHapus<?=$pln['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pelanggan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="form-group">
                                                          <label>Nama Pelanggan : </label>
                                                          <p><?=$pln['nama'];?></p>
                                                        </div>
                                                        <div class="form-group">
                                                          <label>ID Pelanggan : </label>
                                                          <p><?=$pln['id_pelanggan'];?></p>
                                                        </div>
                                                        <form action="" method="POST">
                                                          <input type="text" value="<?=$pln['id'];?>" hidden name="id">
                                                      
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="hapus" class="btn btn-primary">Hapus</button>
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
