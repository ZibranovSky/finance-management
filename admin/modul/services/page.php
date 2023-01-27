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
           <h3 class="col-sm-6">Services</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Services</li>
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Tambah Services
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
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
                                                <th>Title</th>
                                                <th>Deskripsi</th> <!-- isinya validasi dan tombol lihat balasan -->
                                                <th>Gambar</th> <!-- isinya validasi dan tombol lihat balasan -->
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>

                                          <?php 

                                          $no = 1;

                                          foreach (select_services() as $srv):
                                           ?>
                                         
                                           <tr>
                                              <td><?=$no++;?></td>
                                              <td><?= $srv['title'];?></td>
                                              <td><?= $srv['description'];?></td>
                                                    <td>
                                                  <?php 

                                                  if ($srv['foto'] != "") {
                                                    echo '<img src="img/'.$srv['foto'].'" width="150">';
                                                  }else{
                                                    echo '<img src="img/user_logo.png" width="150">';
                                                  }

                                                   ?>
                                                </td>
                                              <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?=$srv['id'];?>">
                                            <i class="fas fa-trash"></i>
                                          </button>

                              <!-- Modal -->
                              <div class="modal fade" id="modalhapus<?=$srv['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal Hapus</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="" method="POST" enctype="multipart/form-data">
                                        
                                       <input type="text" value="<?=$srv['id']?>" name="id" hidden>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" name="hapus_prd" class="btn btn-primary">Hapus Data</button>
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
