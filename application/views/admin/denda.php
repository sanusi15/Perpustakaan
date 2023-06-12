<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Denda</h4>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <div class="col-lg-6 col-sm-12">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">Atur Denda</h3>
                        </div>
                        <div class="col-md-6 ">
                            <button class="btn btn-success text-white float-end btnShowUpdate">Update Denda</button>
                        </div>
                    </div>
                    <table class="table text-nowrap" id="">
                        <thead>
                            <tr>
                                <th class="border-top-0 text-center">#</th>
                                <th class="border-top-0 text-center">Batas Hari</th>
                                <th class="border-top-0 text-center">Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center"><?= $denda['batas']; ?> Hari</td>
                                <td class="text-center">Rp.<?= $denda['nominal']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-danger"><i>*Denda akan berlaku ketika siswa terlambat mengembalikan buku sesuai dengan ketentuan pengembalian dan denda akan bertambah perharinya-;</i></p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 update">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">Update Denda</h3>
                        </div>
                    </div>
                    <form action="<?= base_url('update'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="batas" class="form-label">Batas Hari</label>                            
                            <input type="number" class="form-control" id="batas" name="batas" autofocus autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>                            
                            <input type="number" class="form-control" id="nominal" name="nominal" autofocus autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn btn-primary float-left">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.update').hide()
        $('.btnShowUpdate').click(function() {
            $('.update').show()

        })
    </script>