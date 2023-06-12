<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Perpus | SMK PGRI 1 Kota Serang</title>
    <!-- Favicon icon -->
    <link rel="website icon" type="image/png" sizes="16x16" href="<?= base_url('assets/'); ?>img/logoSMK.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
</head>

<body>
    <div class="cardContainer">
        <div class="cardBg">
            <div class="kiri text-center">
                <div class="cont">
                    <img src="<?= base_url('assets/img/logoSMK.png'); ?>" alt="">
                </div>
                <p class="lbl">SMK PGRI 1 Kota Serang</p>
            </div>
            <div class="kanan text-center">
                <div class="judul">
                    <p>Sistem Informasi Perpustakaan</p>
                </div>
                <div class="inp">
                    <form action="<?= base_url('signIn'); ?>" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username" autocomplete="off" autofocus>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" id="username" name="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                            <?php if ($this->session->flashdata('pesan')) : ?>                                
                                <div class="alert alert-danger mt-3" role="alert">
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/'); ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>