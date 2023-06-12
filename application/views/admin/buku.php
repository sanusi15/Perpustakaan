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
                <h4 class="page-title">Buku</h4>
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
            <div class="col-12">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">List Buku</h3>
                        </div>
                        <div class="col-md-6 ">
                            <button class="btn btn-success text-white float-end" data-bs-toggle="modal" data-bs-target="#tmbhBuku">Tambah Buku</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <button type="button" class="btn btn-secondary anu" hidden>hoho</button>
                        <table class="table text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">#</th>
                                    <th class="border-top-0 text-center">Gambar Sampul</th>
                                    <th class="border-top-0 ">Judul Buku</th>
                                    <th class="border-top-0 ">Kategori</th>
                                    <th class="border-top-0 ">Pengarang</th>
                                    <th class="border-top-0 ">Penerbit</th>
                                    <th class="border-top-0 ">ISBN</th>
                                    <th class="border-top-0 text-center">Jumlah</th>
                                    <th class="border-top-0 text-center">No Rak</th>
                                    <th class="border-top-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($buku as $k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class="">
                                            <img src="assets/img/buku/<?= $k['gambar']; ?>" alt="<?= $k['gambar']; ?>" width="100px" height="100px">
                                        </td>
                                        <td class=""><?= $k['judul']; ?></td>
                                        <td class=""><?= $k['nama_kategori']; ?></td>
                                        <td class=""><?= $k['pengarang']; ?></td>
                                        <td class=""><?= $k['penerbit']; ?></td>
                                        <td class=""><?= $k['isbn']; ?></td>
                                        <td class="text-center"><?= $k['stok']; ?></td>
                                        <td class=""><?= $k['nama_rak']; ?></td>
                                        <td class="text-center">
                                            <a data-id="<?= $k['kode_buku']; ?>" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                            <a href="" data-id="<?= $k['kode_buku']; ?>" class="btn btn-warning del">Hapus</a>

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
    <div class="modal fade" id="tmbhBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('addBuku'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option selected>Pilih Kategori</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">No Rak</label>
                            <select class="form-select" aria-label="Default select example" name="rak">
                                <option selected>Pilih Posisi Rak</option>
                                <?php foreach ($rak as $k) : ?>
                                    <option value="<?= $k['id_rak']; ?>"><?= $k['nama_rak']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="stok" name="stok" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Gambar </label>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="gambar">
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('updateBuku'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="hidden" id="edid" value="" name="id">
                            <input type="text" class="form-control" id="edjudul" name="judul" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori">
                                <option selected id="edkategori"></option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">No Rak</label>
                            <select class="form-select" aria-label="Default select example" name="rak">
                                <option value="" selected id="edrak"></option>                            
                                <?php foreach ($rak as $k) : ?>
                                    <option value="<?= $k['id_rak']; ?>"><?= $k['nama_rak']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="edpengarang" name="pengarang" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="edpenerbit" name="penerbit" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="edisbn" name="isbn" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="edstok" name="stok" autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Gambar </label>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="gambar">
                            </div>
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
        $('.edit').click(function() {
            var id = $(this).data('id')
            $.ajax({
                url: 'getBuku',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(res) {
                    res = JSON.parse(res);
                    console.log(res)
                    $('#edid').val(res.id_buku)
                    $('#edjudul').val(res.judul)
                    $('#edpengarang').val(res.pengarang)
                    $('#edpenerbit').val(res.penerbit)
                    $('#edstok').val(res.stok)
                    $('#edisbn').val(res.isbn)
                    $('#edrak').val(res.id_rak)
                    $('#edrak').html(res.nama_rak)
                    $('#edkategori').html(res.nama_kategori)
                    $('#edkategori').val(res.id_kategori)
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
                        url: 'delBuku',
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