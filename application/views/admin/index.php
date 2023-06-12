<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Jumlah Buku</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <i class=" fas fa-book " style="font-size: 60px; color: green;"></i>
                        <li class="ms-auto"><span class="counter text-success"><?= $jBuku; ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Jumlah Siswa</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <i class="fas fa-address-card " style="font-size: 60px; color: blue;"></i>
                        <li class="ms-auto"><span class="counter text-purple"><?= $jSiswa; ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Jumlah Peminjam</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <i class="fas fa-database " style="font-size: 60px; color: tomato;"></i>
                        <li class="ms-auto"><span class="counter text-info"><?= $jTransaksi; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title" style="color: tomato;">Notifiaction <i class="fas fa-info-circle" style="color: tomato;"></i></h3>
                    <a href="<?= base_url('seeTelat'); ?>" class="periksa">
                        <div class="alert alert-warning" role="alert">
                            Halo <?= $user['nama']; ?>, hari ini ada <span class="alert-link"><?= $jmlhDenda; ?> Siswa</span> yang terlambat mengembalikan buku. Periksa sekarang.
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->