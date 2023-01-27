<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_intro();
  
}

if (isset($_POST['hapus_keluhan'])) {
  hapus_keluhan();
}
  


if (isset($_POST['hapus_int'])) {
 hapus_intro();
}


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Intro</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Intro</li>
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

           <?php 
      global $koneksi;
     
      $select = mysqli_query($koneksi, "SELECT count(id) AS jintro FROM intros");
      $r = mysqli_fetch_array($select);

      if ($r['jintro'] == 1) {
        echo "";
      }else{

       ?>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Intro
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
        <h5 class="modal-title" id="exampleModalLabel">Modal Intro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto">
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

<?php } ?>

<!-- Modal -->

<!-- Tabel -->
<div class="row">
 <div class="table-responsive m-b-30 ml-2">
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
                                                <th>Title</th>
                                                <th>Deskripsi Intro</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                        
                                         
                                          foreach (select_intro() as $int):

                                           ?>
                                          <tr>
                                         <td><?=$int['title'];?></td>
                                          <td><?=$int['description'];?></td>

                                          <td>
                                             <?php 

                                                  if ($int['foto'] != "") {
                                                    echo '<img src="img/'.$int['foto'].'" width="150">';
                                                  }else{
                                                    echo '<img src="img/user_logo.png" width="150">';
                                                  }

                                                   ?>
                                          </td>
                                          <td>
                                           <!-- Button trigger modal -->
                                          
                                            </button>

                                            <!-- Modal -->
                                            <!--  -->
                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusint<?=$int['id'];?>">
                                              <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusint<?=$int['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Intro 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$int['id'];?>" name="id" hidden>
                                                    
                                                    <div class="form-group">
                                                    
                                                    </div>
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="hapus_int" class="btn btn-danger">Hapus</button>
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
