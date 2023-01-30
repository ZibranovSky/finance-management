<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_masukan();
  
}

if (isset($_POST['hapus_keluhan'])) {
  hapus_keluhan();
}
  


if (isset($_POST['hapus_int'])) {
  hapus_masukan();
}


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Masukan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Masukan</li>
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
  Tambah Income Masukan
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
        <h5 class="modal-title" id="exampleModalLabel">Modal Income Masukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
          <label>Kode Sumber</label>
              <?php 
                global $koneksi;
                $id = $adm['id'];
                $barang = "SELECT * FROM sumbers WHERE id_admin='$id'";
                $result = mysqli_query($koneksi, $barang);
                $jsArray = "var sumber = new Array();";

                echo '<select name="kd_sumber" id="kd_sumber" class="form-control" onchange="changeValue(this.value)">';
                echo '<option>--- PILIH ---</option>';

                while ($row = mysqli_fetch_array($result)) {
                    echo '<option name="kd_sumber" value="'. $row['kd_sumber'] .'">'.$row['kd_sumber'].'</option>';
                    $jsArray .= "sumber['". $row['kd_sumber'] ."'] 
                    = { tipe_sumber:'". addslashes($row['tipe_sumber']) ."',
                        name:'". addslashes($row['name']) ."',
                      balance:'". addslashes(rupiah($row['balance'])) ."'
                    };";
                    
                  }
                  echo '</select>';
                
                ?>
                <script type="text/javascript">
            <?php echo $jsArray; ?>
            function changeValue(kd_sumber){
              
              document.getElementById('tipe_sumber').value = sumber[kd_sumber].tipe_sumber;
              document.getElementById('name').value = sumber[kd_sumber].name;
              document.getElementById('balance').value = sumber[kd_sumber].balance;
              
            }
          </script>
             </select>
          </div>
      
  

           
      <div class="form-group">
            <label>Tipe Sumber</label>
            <input type="text" class="form-control" name="tipe_sumber" readonly id="tipe_sumber"> 
          </div>

          <div class="form-group">
            <label>Nama Sumber</label>
            <input type="text" class="form-control" name="nm_sumber" readonly id="name"> 
          </div>
          
          <div class="form-group">
            <label>Saldo / Balance</label>
            <input type="text" class="form-control" name="balance" readonly id="balance"> 
          </div>


          
          <div class="form-group">
            <label>Nominal Masuk</label>
            <input type="text" class="form-control" name="nominal"> 
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
                                                <th>No</th>
                                                <th>Kode Sumber</th>
                                                <th>Tipe Sumber</th>
                                                <th>Nama Sumber</th>
                                                <th>Nominal</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                        
                                         $no = 1;
                                          foreach (select_masukan() as $msk):

                                           ?>
                                          <tr>

                                          <td><?=$no++;?></td>
                                          <td><?=$msk['kd_sumber'];?></td>
                                          <td><?=$msk['tipe_sumber'];?></td>
                                          <td><?=$msk['nm_sumber'];?></td>
                                          <td><?=rupiah($msk['nominal']);?></td>
                                          <td><?=$msk['tgl_masuk'];?></td>
                                          <td><?=$msk['bulan'];?></td>
                                          <td><?=$msk['tahun'];?></td>

                                        
                                          <td>
                                           <!-- Button trigger modal -->
                                          
                                            </button>

                                            <!-- Modal -->
                                            <!--  -->
                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusMasukan<?=$msk['id'];?>">
                                              <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusMasukan<?=$msk['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Masukan 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$msk['id'];?>" name="id" hidden>
                                                    
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
