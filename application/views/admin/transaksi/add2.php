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
                <h4 class="page-title">Tambah Transaksi</h4>
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
        <form action="<?= base_url('transaksi/prosespinjam'); ?>" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="white-box">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <h3 class="box-title">Data Transaksi</h3>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td class="border-top-0">No Pinjam</td>
                                            <td class="border-top-0">:</td>
                                            <td class="border-top-0">
                                                <input type="text" name="nopinjam" value="<?= $kode_pinjam; ?>" readonly class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Peminjaman</td>
                                            <td>:</td>
                                            <td>
                                                <input type="date" value="<?= date('Y-m-d'); ?>" name="tgl" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NISN Siswa</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" required autocomplete="off" name="nisn" id="search-box" placeholder="Contoh NISN : 205727101" type="text" value="">
                                                    <span class="input-group-btn">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalSiswa" class="btn btn-primary"><i class="fa fa-search"></i></a>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <div id="result_tunggu">
                                        <h5 class="box-title">*Display Siswa...</h5>
                                    </div>
                                    <div id="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-6">
                    <div class="white-box">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <h3 class="box-title">Pilih Buku</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-nowrap myTable" id="">
                                <thead>
                                    <tr>
                                        <th class="border-top-0 text-center">#</th>
                                        <th class="border-top-0 text-center">Judul</th>
                                        <th class="border-top-0 text-center">Kategori</th>
                                        <th class="border-top-0 text-center">Stok</th>
                                        <th class="border-top-0 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($buku as $k) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class=""><?= $k['judul']; ?></td>
                                            <td class=""><?= $k['nama_kategori']; ?></td>
                                            <td class=""><?= $k['stok']; ?></td>
                                            <td class="text-center">

                                                <a class="btn btn-primary show"  data-id="<?= $k['kode_buku']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if($k['stok'] > 1) : ?>
                                                <a href="" class="btn btn-success text-white add " data-kode_buku="<?= $k['kode_buku']; ?>" data-judul="<?= $k['judul']; ?>" data-kategori="<?= $k['nama_kategori']; ?>">
                                                    <i class="fas fa-cart-plus"></i>
                                                </a>
                                                <?php else : ?>
                                                    <button class="btn btn-secondary text-white " disabled><i class="fas fa-cart-plus"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-6">
                    <div id="result_buku"></div>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger text-white float-end ms-2 btnCntrl">Batal</a>
                    <input type="hidden" name="tambah" value="tambah">
                    <button type="submit" class="btn btn-success text-white float-end btnCntrl">Proeses</button>
                </div>
        </form>
    </div>
    </form>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5><b>Detail Buku</b></h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>Judul Buku : <span id="edjudul" class="text-primary "></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>Penerbit : <span id="edpenerbit" class="text-primary "></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Kategori : <span id="edkategori" class="text-primary "></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>No ISBN : <span id="edisbn" class="text-primary "></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Pengarang : <span id="edpengarang" class="text-primary "></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>Stok : <span id="edstok" class="text-primary "></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal siswa -->
<div class="modal fade" id="modalSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal_body" class="modal-body fileSelection1">
                <table id="example3" class="table table-bordered table-striped myTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($siswa as $isi) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $isi['nisn']; ?></td>
                                <td><?= $isi['nama']; ?></td>
                                <td><?= $isi['nama_jurusan']; ?></td>
                                <td class="text-center"><?= $isi['gender']; ?></td>
                                <td><?= $isi['alamat']; ?></td>
                                <td class="text-center" style="width:20%;">
                                    <button class="btn btn-primary selectSiswa" id="selectSiswa" data-nisn="<?= $isi['nisn']; ?>">
                                        <i class="fa fa-check"> </i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // hide component di awal
    $('.btnCntrl').hide()

    // pilih siswa
    $(".selectSiswa").click(function(e) {
        let nisn = $(this).data('nisn')
        $('#modalSiswa').modal('hide');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('transaksi/result'); ?>",
            data: 'kode_anggota=' + nisn,
            beforeSend: function() {
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html) {
                $("#result").html(html);
                $("#result_tunggu").html('');
                $('#search-box').val(nisn);
            }
        });
    });
    // cari siswa keyup
    $("#search-box").keyup(function(e) {
        let nisn = $(this).val()
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('transaksi/result'); ?>",
            data: 'kode_anggota=' + nisn,
            beforeSend: function() {
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html) {
                $("#result").html(html);
                $("#result_tunggu").html('');
            }
        });
    });

    $('.show').click(function() {
        var id = $(this).data('id')
        $.ajax({
            url: 'getBuku',
            method: 'POST',
            data: {
                id: id
            },
            success: function(res) {                
                res = JSON.parse(res);
                $('#edid').html(res.id_buku)
                $('#edjudul').html(res.judul)
                $('#edpengarang').html(res.pengarang)
                $('#edpenerbit').html(res.penerbit)
                $('#edstok').html(res.stok)
                $('#edisbn').html(res.isbn)
                $('#edrak').html(res.id_rak)
                $('#edrak').html(res.nama_rak)
                $('#edkategori').html(res.nama_kategori)
                $('#edkategori').html(res.id_kategori)
            }
        })
    })

    $('.add').click(function(e) {
        e.preventDefault()
        var kode_buku = $(this).data('kode_buku')
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('transaksi/buku'); ?>",
            data: 'kode_buku=' + kode_buku,
            beforeSend: function() {
                $("#result_buku").html("");
                $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html) {

                $("#result_buku").load("<?= base_url('transaksi/buku_list'); ?>");
                $("#result_tunggu_buku").html('');
            }
        });
        $('.btnCntrl').show();
    })
</script>