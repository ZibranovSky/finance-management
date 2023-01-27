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
  


if (isset($_POST['hapus'])) {
 
}


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Keluhan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Keluhan</li>
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
                                        <table class="table table-responsive" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pelanggan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Kode Keluhan</th>
                                                <th>Judul</th>
                                                <th>Waktu Keluhan</th>
                                                <th>Waktu Tanggapan</th>
                                                <th>Admin</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                          $no = 1;

                                          foreach (select_keluhan() as $klh):

                                           ?>

                                           <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $klh['id_pelanggan'];?></td>
                                            <td><?= $klh['nm_pelanggan'];?></td>
                                            <td><a href="?m=keluhan&s=response&kd_keluhan=<?=$klh['kd_keluhan'];?>" target="_BLANK"><?= $klh['kd_keluhan'];?></a></td>
                                            <td><?= $klh['judul'];?></td>
                                            <td><?= $klh['waktu_keluhan'];?></td>
                                            <td><?= $klh['waktu_tanggapan'];?></td>
                                            <td><?= $klh['admin'];?></td>
                                            <td>
                                              <?php if ($klh['waktu_tanggapan']==""){ ?>
                                                <span class="badge badge-info">Belum Ditanggapi</span>
                                              <?php }else{ ?>
                                                <span class="badge badge-success">Sudah Ditanggapi</span>
                                              <?php } ?>
                                            </td>
                                            <td>
                                              <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusKeluhan">
                                                <i class="fa fa-trash"></i>
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="hapusKeluhan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Keluhan</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <b><label>Judul Keluhan : </label></b>
                                                      <p><?= $klh['judul'];?></p>

                                                      <form action="" method="POST">
                                                        <input type="text" value="<?=$klh['id'];?>" name="id" hidden>
                                                     
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                      <button type="submit" class="btn btn-primary" name="hapus_keluhan">Hapus Keluhan</button>
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
