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
                <h4 class="page-title">Siswa</h4>
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
            <div class="col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">List Siswa</h3>
                        </div>
                        <div class="col-md-6 ">
                            <button class="btn btn-success text-white float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Siswa</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap myTable" id="">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">#</th>
                                    <th class="border-top-0 ">Nama Siswa</th>
                                    <th class="border-top-0 ">NISN</th>
                                    <th class="border-top-0 ">Jurusan</th>
                                    <th class="border-top-0 ">Gender</th>
                                    <th class="border-top-0 ">Alamat</th>
                                    <th class="border-top-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($siswa as $k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class=""><?= $k['nama']; ?></td>
                                        <td class=""><?= $k['nisn']; ?></td>
                                        <td class=""><?= $k['nama_jurusan']; ?></td>
                                        <td class=""><?= $k['gender']; ?></td>
                                        <td class=""><?= $k['alamat']; ?></td>
                                        <td class="text-center">
                                            <a data-id="<?= $k['id_siswa']; ?>" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                            <a href="" data-id="<?= $k['id_siswa']; ?>" class="btn btn-warning del">Hapus</a>

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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('addSiswa'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <div class="form-group">
                                <select class="form-control" name="jurusan" id="">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?= $j['id_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="form-group">
                                <select class="form-control" name="gender" id="">
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" autofocus autocomplete="off">
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
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('updateSiswa'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Siswa</label>
                            <input type="hidden" class="form-control" id="editId" name="idSiswa">
                            <input type="text" class="form-control" id="ednama" name="nama" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="ednisn" name="nisn" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">jurusan</label>
                            <select class="form-control" name="jurusan" id="">
                                <option value="" id="edjurusan"></option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option value="<?= $j['id_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="form-group">
                                <select class="form-control" name="gender" id="">
                                    <option selected disabled>Pilih Gender</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">alamat</label>
                            <input type="text" class="form-control" id="edalamat" name="alamat" autofocus autocomplete="off">
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
        $('.edit').click(function(e) {
            e.preventDefault()
            var id = $(this).data('id')
            $.ajax({
                url: 'getSiswa',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(res) {
                    res = JSON.parse(res);
                    console.log(res)
                    $('#editId').val(res.id_siswa)
                    $('#ednama').val(res.nama)
                    $('#ednisn').val(res.nisn)
                    $('#edjurusan').html(res.nama_jurusan).val(res.id_jurusan)
                    $('#edgender').val(res.gender)
                    $('#edalamat').val(res.alamat)
                }
            })
        })

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
                        url: 'delSiswa',
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