<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan_ttg'])) {
  
  insert_tentang();
}

if (isset($_POST['hapus_ttg'])) {
  hapus_tentang();
}

 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Tentang</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tentang</li>
            </ol>
          </div><!-- /.col -->
        </div>
  </div>



  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">

      <?php 
      global $koneksi;
      $id = $adm['id'];
      $select = mysqli_query($koneksi, "SELECT * FROM tb_tentang_kami WHERE id_admin='$id'");
      $cek = mysqli_fetch_row($select);

      if ($cek) {
        echo "";
      }else{

       ?>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Tentang Kami
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
        <h5 class="modal-title" id="exampleModalLabel">Modal Tentang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="text" value="<?=$adm['id'];?>" name="id_admin" hidden>
          <div class="form-group">
            <label>Tentang Kami</label>
            <textarea name="tentang_kami" class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan_ttg" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

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
                                                <th>Tentang kami</th>
                                               
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                          $no = 1;
                                         
                                          foreach (select_tentang() as $ttg):

                                           ?>
                                          <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$ttg['tentang_kami'];?></td>
                                          
                                          <td>
                                           <!-- Button trigger modal -->
                                          
                                            </button>

                                            <!-- Modal -->
                                            <!--  -->
                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusttg<?=$ttg['id'];?>">
                                              <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusttg<?=$ttg['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tentang 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$ttg['id'];?>" name="id" hidden>
                                                    
                                                    <div class="form-group">
                                                    
                                                    </div>
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="hapus_ttg" class="btn btn-danger">Hapus</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Button trigger modal -->

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
