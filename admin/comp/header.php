<?php require 'fungsi/fungsi.php'; ?>
<?php foreach (panggil_admin() as $adm): ?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?=$judul;?></title>

    <!-- Fontfaces CSS-->
    <link href="<?=url()?>css/w3.css" rel="stylesheet" media="all">
    <link href="<?=url()?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- ICON -->
    <link rel="icon" href="<?=url()?>images/logo_absensi.png" type="image/png">
    <!-- Bootstrap CSS-->
    <link href="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- <?=url()?>Vendor CSS-->
    <link href="<?=url()?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=url()?>css/theme.css" rel="stylesheet" media="all">

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- sweet alert -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
 
    <!--CSS LeafletJS-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
    <!--JavaScript LeafletJS-->
    <script
      src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""
    ></script>
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="index.php">
                    <img src="<?=url()?>images/logo_netland.png" alt="CRM" width="120px" height="20px" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        
                         <img src="img/user_logo.png" width="150">

                    
                    </div>
                    <h4 class="name" id="nama"><?=$adm['name'];?> </h4>
                    <a href="logout.php"><button class="btn btn-danger">Sign out</button></a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                             <!--    <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span> -->
                            </a>
                           <!--  <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li>
                            </ul> -->
                        </li>
                       
                      <?php 
                            if ($adm['typeuser']!="nemesis") {
                                echo "";
                            }else{
                         ?>
                        <li>
                            <a href="index.php?m=admin&s=awal">
                                <i class="fas fa-user"></i>Data Admin</a>
                            
                        </li>
                    <?php } ?>
                         <li>
                            <a href="index.php?m=sumber&s=awal">
                                <i class="fas fa-id-card"></i>Sumber / Income</a>
                            
                        </li>
                         <li>
                                <a href="index.php?m=masukan&s=page">
                                <i class="fas fa-book"></i>Income Masukan</a>
                            
                        </li>
                         <li>
                                <a href="index.php?m=keluaran&s=page">
                                <i class="fas fa-star"></i>Keluaran Dana</a>
                            
                        </li>
                        <li>
                            <a href="index.php?m=rekap&s=page">
                                <i class="fas fa-thumbs-up"></i>Rekap</a>
                            
                        </li>
                     
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="index.php">
                    <img src="<?=url()?>images/logo_netland.png" alt="CRM" width="120px" height="20px" />
                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                            <form action="" method="POST" class="form-inline ml-3">
                          <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" name="cari" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                              <button class="btn btn-navbar" name="go" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                                    </div>
                                </div>
                               
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="index.php?m=akun">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                      
                                       
                                    </div>
                                    <div class="account-dropdown__body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                         

                         <img src="img/user_logo.png" width="150">

                   
                        </div>
                        <a href="index.php?m=akun"><h4 class="name"><?= $adm['name']; ?></h4></a>
                        <a href="logout.php"><button class="btn btn-danger">Sign out</button></a>
                    </div>
                    <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        

                      <?php 
                            if ($adm['typeuser']!="nemesis") {
                                echo "";
                            }else{
                         ?>
                        <li>
                            <a href="index.php?m=admin&s=awal">
                                <i class="fas fa-user"></i>Data Admin</a>
                            
                        </li>
                    <?php } ?>
                         <li>
                            <a href="index.php?m=sumber&s=awal">
                                <i class="fas fa-id-card"></i>Sumber / Income</a>
                            
                        </li>
                         <li>
                                <a href="index.php?m=masukan&s=page">
                                <i class="fas fa-book"></i>Income Masukan</a>
                            
                        </li>
                         <li>
                                <a href="index.php?m=keluaran&s=page">
                                <i class="fas fa-star"></i>Keluaran Dana</a>
                            
                        </li>
                        <li>
                            <a href="index.php?m=rekap&s=page">
                                <i class="fas fa-thumbs-up"></i>Rekap</a>
                            
                        </li>
                       
                    </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->
            <?php endforeach; ?>