<?php include 'comp/header.php' ?>



            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?=select_admin_2();?></h2>
                                    <span class="desc" style="color: #181818;">Jumlah Admin</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number" id="saldo" hidden><?=hitung_saldo();?></h2> <button onclick="showSaldo()" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                    <span class="desc" style="color: #181818;">Jumlah Saldo</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="statistic__item">
                                    <h2 class="number" id="saldo_keluar" hidden><?=hitung_pengeluaran();?></h2> <button onclick="showKeluar()" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                    <span class="desc" style="color: #181818;">Pengeluaran Bulan Ini</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                          
                          
                        </div>
                    </div>
                </div>

                
            </section>



            

            <!-- END STATISTIC-->
            
         

    <!-- Jquery JS-->
  <?php include 'comp/footer.php'; ?>
