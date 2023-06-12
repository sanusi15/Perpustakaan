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
                <h4 class="page-title">Detail</h4>
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
            <div class="col-12">
                <div class="white-box">
                    <div class="row my-2">
                        <div class="col-md-6">
                            <h3 class="box-title">Info detail peminjaman</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-striped">
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Data Transaksi</td>
                                    </tr>
                                    <tr>
                                        <td>No Pinjam</td>
                                        <td>:</td>
                                        <td><?= $dt['no_pinjam']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pinjam</td>
                                        <td>:</td>
                                        <td><?= $dt['tgl_pinjam']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td>:</td>
                                        <td><?= $dt['tgl_kembali']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN Siswa</td>
                                        <td>:</td>
                                        <td><?= $dt['nisn']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Data Siswa</td>
                                        <td>:</td>
                                        <td>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Nama Siswa</td>
                                                    <td>:</td>
                                                    <td><?= $ds['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jurusan</td>
                                                    <td>:</td>
                                                    <td><?= $ds['nama_jurusan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td>:</td>
                                                    <td><?= $ds['gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $ds['alamat']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lama Pinjam</td>
                                        <td>:</td>
                                        <td><?= $dt['lama_pinjam']; ?> Hari</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-6">
                                <table class="table table-striped">
                                    <tr>
                                        <td colspan="3" class="bg-primary text-white">Data Pinjam</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?= $dt['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Pengembalian</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($dt['tgl_pengembalian'] == '0') : ?>
                                                <span class="badge bg-danger">Belum dikembalikan</span>
                                            <?php else : ?>
                                                <?= $dt['tgl_pengembalian']; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Denda</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($denda['status'] == true) : ?>
                                                <span><?= $denda['mingguTelat']; ?> Minggu</span><br>
                                                <span class="text-danger" style="font-size: 20px;"><?= $denda['dendaTotal']; ?></span><br>
                                            <?php else : ?>
                                                <span class="badge bg-warning">Tidak ada denda</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Buku</td>
                                        <td>:</td>
                                        <td>
                                            <?php $i = 1;
                                            foreach ($dib as $d) : ?>
                                                <span><?= $i++; ?>. <?= $d['kode_buku']; ?></span><br>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Data Buku</td>
                                        <td>:</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Penerbit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($dib as $isi) {
                                                        $buku = $this->db->get_where('tbl_buku', ['kode_buku' => $isi['kode_buku']])->row();
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $buku->judul; ?></td>
                                                            <td><?= $buku->penerbit; ?></td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                
                                <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger float-end text-white">Kembali</a>
                            </div>
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


    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>