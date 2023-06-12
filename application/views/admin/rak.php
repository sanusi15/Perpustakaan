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
                <h4 class="page-title">Rak</h4>
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
                            <h3 class="box-title">List Rak</h3>
                        </div>
                        <div class="col-md-6 ">
                            <button class="btn btn-success text-white float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <button type="button" class="btn btn-secondary anu" hidden>hoho</button>
                        <table class="table text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">#</th>
                                    <th class="border-top-0 text-center">Nama Rak</th>
                                    <th class="border-top-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($rak as $k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class=""><?= $k['nama_rak']; ?></td>
                                        <td class="text-center">
                                            <a href="" data-id="<?= $k['id_rak']; ?>" class="btn btn-warning del">Hapus</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Rak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('addRak'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="namaRak" class="form-label">Nama Rak</label>
                            <input type="text" class="form-control" id="namaRak" name="namaRak" autofocus autocomplete="off">
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


    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.del').click(function(e) {
            e.preventDefault()
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Data ini aka terhapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delRak',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            res = JSON.parse(res);
                            if (res == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                            location.reload()
                        }
                    })

                }
            })
        })
    </script>