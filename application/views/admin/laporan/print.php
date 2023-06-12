<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>SI Perpus | SMK PGRI 1 Kota Serang</title>
    <!-- Favicon icon -->
    <link rel="website icon" type="image/png" sizes="16x16" href="<?= base_url('assets/'); ?>img/logoSMK.png">
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/'); ?>css/style.min.css" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/datatables/datatables.css">

    <style>
        .container {
            padding: 20px 150px;
        }

        table {
            width: 100%;

            border: 1px solid #000;
        }

        table tr td {
            border: 1px solid #000;
        }

        table tr th {
            border: 1px solid #000;

        }



        @media print {
            .container {
                padding: 20px 70px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="">
            <tr>
                <td width="10%" rowspan="4" class="text-center p-2"><img src="<?= base_url('assets/img/logoSMK.png'); ?>" alt="logo" width="80px;"></td>
            </tr>
            <tr>
                <td class="text-center" style="font-weight: bold;">SMK PGRI 1 Kota Serang</td>
            </tr>
            <tr>
                <td class="text-center" style="font-weight: bold;">Email : info@smkpgri1kotaserang.sch.id</td>
            </tr>
            <tr>
                <td class="text-center" style="font-weight: bold;">Alamat : Jl. Ciwaru Raya No.55</td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">Laporan Perpustakaan Dari Tanggal : <?= $tgl['1']; ?> Sampai Tanggal : <?= $tgl['2']; ?></td>
            </tr>
        </table>
        <table class=" mt-2">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode Transaksi</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Denda</th>
            </tr>
            <?php $i = 1;
            foreach ($result as $r) : ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td class="text-center"><?= $r['no_pinjam']; ?></td>
                    <td class="text-center"><?= $r['tgl_denda']; ?></td>
                    <td class="text-center">Rp. <?= $r['denda']; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr style="font-weight: bold;">
                    <td class="text-center" colspan="3">Total Denda</td>
                    <td class="text-center">Rp. <?= $count; ?></td>
                </tr>
        </table>
        <div class="float-end" style="width: 20%;height: 50px; margin-top: 40px;">
            <div class="row text-center">
                <div class="mb-5" style="font-weight: bold;">Anang, S.Pd</div>
                <div>Kepala Sekolah</div>
            </div>
        </div>
    </div>
</body>

<script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--page dashboard -->
<!--chartis chart-->

<!--page dashboard -->

<script>
    window.print()
</script>

</html>