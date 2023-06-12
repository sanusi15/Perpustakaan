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
                <h4 class="page-title">Profile</h4>
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
            <?php if ($this->session->flashdata('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('failed'); ?>
                </div>
            <?php endif; ?>
            <div class="col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">Data Admin</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-md-3">Nama </div>
                                <div class="col-md-1">: </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" disabled value="<?= $user['nama']; ?>" id="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Username </div>
                                <div class="col-md-1">: </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" disabled value="<?= $user['username']; ?>" id="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">Level </div>
                                <div class="col-md-1">: </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" disabled value="<?= $user['id_level'] == 1 ? 'Petugas' : ''; ?>" id="">
                                </div>
                            </div>
                            <div class="row mx-5">
                                <div class="col-md-6">
                                    <button class="btn btn-danger text-white mt-5 float-end" data-bs-toggle="modal" data-bs-target="#ubPw">
                                        <i class="fas fa-key"></i>
                                        Ubah Password
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-success text-white mt-5 float-end mx-2 edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-user"></i>
                                        Update Data
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="<?= base_url('assets/img/' . $user['foto']); ?>" width="250px" height="250px" class="img img-thumbnail rounded-circle" alt="">
                        </div>
                    </div>
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
    <!-- Modal add data -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('welcome/updateProfile'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="ednama" name="nama" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edusername" name="username" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" autofocus autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit data -->
    <div class="modal fade" id="ubPw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('login/upPw'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="pw1" class="form-label">Password Baru</label>
                            <input type="text" class="form-control" id="pw1" name="pw1" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="pw2" class="form-label">Konfirmasi Password</label>
                            <input type="text" class="form-control" id="pw2" name="pw2" autofocus autocomplete="off">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.edit').click(function() {
            var id = $(this).data('id')
            $.ajax({
                url: 'getUser',
                method: 'POST',

                success: function(res) {
                    res = JSON.parse(res);
                    $('#ednama').val(res.nama)
                    $('#edusername').val(res.username)
                }
            })
        })
    </script>