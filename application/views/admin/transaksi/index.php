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
                <h4 class="page-title">Transaksi</h4>
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
                            <h3 class="box-title">List Transaksi</h3>
                        </div>
                        <div class="col-md-6 ">
                            <a href="<?= base_url('addTr'); ?>" class="btn btn-success text-white float-end">Tambah Transaksi</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap myTable" id="">
                            <thead>
                                <tr>
                                    <th class="border-top-0 text-center">#</th>
                                    <th class="border-top-0 ">Kode Pinjam</th>
                                    <th class="border-top-0 ">Nama Siswa</th>
                                    <th class="border-top-0 text-center">Tanggal Pinjam</th>
                                    <th class="border-top-0 text-center">Tanggal Kembali</th>
                                    <th class="border-top-0 text-center">Status</th>
                                    <th class="border-top-0 text-center">Tanggal Pengembalian</th>
                                    <th class="border-top-0 text-center">Total Denda</th>
                                    <th class="border-top-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($transaksi as $k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class=""><?= $k['no_pinjam']; ?></td>
                                        <td class=""><?= $k['nama']; ?></td>
                                        <td class="text-center"><?= $k['tgl_pinjam']; ?></td>
                                        <td class="text-center"><?= $k['tgl_kembali']; ?></td>
                                        <td class="text-center">
                                            <?php if ($k['status'] == 'Dipinjam') : ?>
                                                <span class="badge bg-primary"><?= $k['status']; ?></span>
                                            <?php else : ?>
                                                <span class="badge bg-success"><?= $k['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($k['tgl_pengembalian'] == '0') : ?>
                                                <span class="badge bg-danger">Belum dikembalikan</span>
                                            <?php else : ?>
                                                <?= $k['tgl_pengembalian']; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($k['status'] == 'Di Kembalikan') {
                                                $denda = $this->db->get_where('tbl_denda', ['no_pinjam' => $k['no_pinjam']])->row_array();
                                                if($denda != 0){
                                                    echo "<span class='text-danger'>".$this->AdminModel->rp($denda['denda'])."</span>";
                                                }else{
                                                    echo $this->AdminModel->rp($denda['denda']);

                                                }
                                            } else {                                                
                                                $tgl1 = $k['tgl_kembali'];
                                                $today = date('Y-m-d');
                                                $selisih = strtotime($today) - strtotime($tgl1); // menghitung selisih waktu dalam detik
                                                $selisih_minggu = floor($selisih / (60 * 60 * 24 * 7)); // menghitung selisih waktu dalam minggu bulat
                                                if ($selisih_minggu > 0) {
                                                    $dd = $this->db->get('tbl_biaya_denda')->row();
                                                    $denda = $selisih_minggu * $dd->nominal; // denda per minggu adalah 3000
                                                    echo "<span style='font-size:12px;'>Terlambat: " . $selisih_minggu . " Minggu </span><br>";
                                                    echo "<span class='badge bg-danger' style='font-size:12px;'>".$this->AdminModel->rp($denda)."</span>";
                                                } else {
                                                    echo "<span class='badge bg-warning'>Tidak ada denda</span>";
                                                }                                                                                                
                                                
                                                
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('detailPinjam/' . $k['no_pinjam']); ?>" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <?php if ($k['status'] == 'Dipinjam') : ?>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#TableDenda" class="btn btn-warning kembali" data-kode="<?= $k['no_pinjam']; ?>">
                                                    <i class="fas fa-sync me-2"></i>Kembalikan
                                                </a>
                                            <?php else : ?>
                                                <button class="btn btn-success text-white">
                                                    <i class=" fas fa-check me-2"></i>Di Kembalikan
                                                </button>
                                            <?php endif; ?>
                                            <a href="" data-nop="<?= $k['no_pinjam']; ?>" class="btn btn-danger text-white del">
                                                <i class="fas fa-trash"></i>
                                            </a>
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

    <!--modal import -->
    <div class="modal fade" id="TableDenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td colspan="3" class="bg-primary text-white">Detail Pengembalian Buku</td>
                        </tr>
                        <tr>
                            <td width="40%">No Pinjam</td>
                            <td width="10%">:</td>
                            <td id="edNoPinjam"></td>
                        </tr>
                        <tr>
                            <td width="40%">Tanggal Pinjam</td>
                            <td width="10%">:</td>
                            <td id="edTglPinjam"></td>
                        </tr>
                        <tr>
                            <td width="40%">Tanggal Kembali</td>
                            <td width="10%">:</td>
                            <td id="edTglKembali"></td>
                        </tr>
                        <tr>
                            <td width="40%">NISN Siswa</td>
                            <td width="10%">:</td>
                            <td id="edNisn"></td>
                        </tr>
                        <tr>
                            <td width="40%">Tanggal Pengembalian</td>
                            <td width="10%">:</td>
                            <td id="edTglPengembalian"></td>
                        </tr>
                        <tr>
                            <td width="40%">Terlewat Masa Pengembalian</td>
                            <td width="10%">:</td>
                            <td id="edMasaPengembalian"></td>
                        </tr>
                        <tr>
                            <td width="40%">Jumlah Buku</td>
                            <td width="10%">:</td>
                            <td id="edBuku">Askdaksdh</td>
                        </tr>
                        <tr>
                            <td width="40%">Denda</td>
                            <td width="10%">:</td>
                            <td id="edDenda"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary btnProses">
                        <i class="fas fa-rocket"></i>
                        Lanjut Proses
                    </a>
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.kembali').click(function(e) {
            e.preventDefault()
            var noP = $(this).data('kode')
            $.ajax({
                url: 'backBuku',
                method: 'POST',
                data: {
                    nop: noP
                },
                success: function(res) {
                    const val = JSON.parse(res)
                    const link = val.noPinjam
                    $('#edNoPinjam').html(val.no_pinjam);
                    $('#edTglPinjam').html(val.tgl_pinjam);
                    $('#edTglKembali').html(val.tgl_kembali);
                    $('#edNisn').html(val.nisn);
                    $('#edLamaPinjam').html(val.lama_pinjam);
                    $('#edTglPengembalian').html(val.tgl_pengembalian);
                    $('#edMasaPengembalian').html(val.lewat_hari);
                    $('#edBuku').html(val.detail_buku);
                    $('#edDenda').html(val.denda);
                    $('.btnProses').attr('href', '<?= base_url('prosesBack/') ?>' + val.no_pinjam);
                }
            })
        })

        $('.del').click(function(e) {
            e.preventDefault()
            var id = $(this).data('nop')
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
                        url: '<?= base_url('transaksi/prosespinjam')?>',
                        method: 'GET',
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