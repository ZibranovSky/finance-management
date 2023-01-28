<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan_klb'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_kelebihan();

  
}


  


if (isset($_POST['hapus'])) {
 delete_kelebihan();
}


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Kelebihan Kami</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kelebihan Kami</li>
            </ol>
          </div><!-- /.col -->
        </div>
  </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Kelebihan
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
        <form action="" method="POST">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_klb" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
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
                                                <th>Title</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                          $no = 1;
                                         
                                          foreach (select_kelebihan() as $klb):

                                           ?>
                                          <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$klb['title'];?></td>
                                          <td><?=$klb['description'];?></td>

                                          
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$klb['id'];?>" hidden name="id">
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