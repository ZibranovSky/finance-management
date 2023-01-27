<?php include 'comp/header.php'; ?>
<?php 

  if (isset($_POST['simpan'])) {
    insert_saran();
  }

  if (isset($_POST['hapus_saran'])) {
    
    hapus_saran();

  }

  if (isset($_POST['edit_saran'])) {
    $id = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    update_saran($id, $id_pelanggan);
  }

 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Saran</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Saran</li>
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
                                                <th>Saran</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tanggal Saran</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                          $no = 1;
                                         
                                          foreach (select_saran() as $srn):

                                           ?>
                                          <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$srn['nm_pelanggan'];?></td>
                                          <td><?=$srn['saran'];?></td>
                                          <td><?=$srn['tgl_saran'];?></td>
                                          <td>
                                           <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal<?=$srn['id'];?>">
                                              <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="viewModal<?=$srn['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Saran <?=$srn['nm_pelanggan'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="form-group">
                                                      <label>Nama Pelanggan : </label>
                                                      <p><?=$srn['nm_pelanggan'];?></p>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Id Pelanggan : </label>
                                                      <p><?=$srn['id_pelanggan'];?></p>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Tanggal Saran : </label>
                                                      <p><?=$srn['tgl_saran'];?></p>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Isi Saran : </label>
                                                      <p><?=$srn['saran'];?></p>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$srn['id'];?>">
  <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$srn['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Saran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <input type="text" name="id" value="<?=$srn['id'];?>" hidden>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="hapus_saran">Hapus</button>
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
