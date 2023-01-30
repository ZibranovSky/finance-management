<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['simpan'])) {
    // echo "<meta http-equiv='refresh' content='0'>";
     // echo "<meta http-equiv='refresh' content='0'>";
     insert_keluarans();
  
}



if (isset($_POST['hapus_klr'])) {
  hapus_keluarans();
}


 ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    
  </div>
  <div class="content-wrapper">
  <div class="content-header">
     <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Keluaran</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Keluaran</li>
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
  Tambah Keluaran
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
        <h5 class="modal-title" id="exampleModalLabel">Modal Keluaran</h5>
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
            <label>Agenda Pengeluaran</label>
            <input type="text" class="form-control" required="" autocomplete="off" name="agenda"> 
          </div>
          
          <div class="form-group">
            <label>Nominal Keluar</label>
            <input type="number" class="form-control" required="" autocomplete="off" name="nominal_keluar"> 
          </div>
        
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" required="" autocomplete="off" name="keterangan"></textarea>
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
                                                <th>Agenda</th>
                                                <th>Tipe Sumber</th>
                                                <th>Nama Sumber</th>
                                                <th>Nominal Keluar</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                          <?php 

                                        
                                         $no = 1;
                                          foreach (select_keluaran() as $klr):

                                           ?>
                                          <tr>

                                          <td><?=$no++;?></td>
                                          <td><?=$klr['agenda'];?></td>
                                          <td><?=$klr['tipe_sumber'];?></td>
                                          <td><?=$klr['nm_sumber'];?></td>
                                          <td><?=rupiah($klr['nominal_keluar']);?></td>
                                          <td><?=$klr['tgl_keluar'];?></td>
                                          <td><?=$klr['bulan'];?></td>
                                          <td><?=$klr['tahun'];?></td>
                                          <td><?=$klr['keterangan'];?></td>


                                        
                                          <td>
                                           <!-- Button trigger modal -->
                                          
                                            </button>

                                            <!-- Modal -->
                                            <!--  -->
                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Hapuskeluarans<?=$klr['id'];?>">
                                              <i class="fa fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="Hapuskeluarans<?=$klr['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Keluaran 
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form action="" method="POST">
                                                      <input type="text" value="<?=$klr['id'];?>" name="id" hidden>
                                                    
                                                    <div class="form-group">
                                                    
                                                    </div>
                                                    
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="hapus_klr" class="btn btn-danger">Hapus</button>
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
