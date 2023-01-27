<?php include 'comp/header.php'; ?>

<?php 

if (isset($_POST['update_tanggapan'])) {
  update_keluhan();
}

 ?>

<?php 
global $koneksi;

$kd_keluhan = $_GET['kd_keluhan'];

$select = mysqli_query($koneksi, "SELECT * FROM keluhans WHERE kd_keluhan='$kd_keluhan'");
$row = mysqli_fetch_array($select);

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
        <div class="col-sm-10"><br>
          <!-- Button trigger modal -->
            <i><label><?=$row['nm_pelanggan'];?> | <?=$row['id_pelanggan'];?></label></i><br>
            <button type="button" class="btn btn-primary">
              <?=$row['waktu_keluhan'];?>
            </button>

            <textarea readonly="" class="form-control mt-5"><?=$row['deskripsi'];?></textarea>

   
   
<!-- end table -->
  
        </div>  
      </div>


    

      <?php if ($row['waktu_tanggapan'] && $row['tanggapan'] != ''){ ?>
              <div class="row">
                <div class="col-sm-10"><br>
          <!-- Button trigger modal -->
         
            
         
              <button type="button" class="btn btn-primary">
             <?=$row['waktu_tanggapan']?>
            </button>
            <textarea readonly="" class="form-control mt-5"><?=$row['tanggapan'];?></textarea>

        </div>  
      

      </div>
      <?php }else{ ?>
         <div class="row">
                <div class="col-sm-10"><br>
          <!-- Button trigger modal -->
              <form action="" method="POST">
                <textarea class="form-control mt-5" name="tanggapan"></textarea>

                <input type="text" hidden="" value="<?=$row['kd_keluhan'];?>" name="kd_keluhan">
                <input type="text" hidden="" value="<?=$row['id_pelanggan'];?>" name="id_pelanggan">

                <button type="submit" name="update_tanggapan" class="btn btn-primary mt-4">Beri Tanggapan</button>
              </form>
              
            

        </div>  
      

      </div>
      <?php } ?>


    </div>
  </section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
