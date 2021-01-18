<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar - miokard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->

    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form class="user" action="<?= base_url('/register'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="login-form-head" style="background-color: #E82C23;">
                        <div class="logo mb-2">
                            <a href="#"><img src="<?= base_url('assets/images/icon/logomiokard-login.png'); ?>" alt="logo"></a>
                        </div>
                        <!-- <h4>Sign In</h4> -->
                    </div>
                    <?php if (session('warning')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mx-5 mt-5" role="alert">
                            <strong> <?= session('warning'); ?> </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="exampleInputEmail1">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="re_pass">Repeat Password</label>
                            <input type="password" name="re_password" id="re_pass">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="e_mail">E-mail</label>
                            <input type="email" name="email" id="e_mail">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="fullname">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="usia">Usia</label>
                            <input type="number" name="usia" id="usia">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <br>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="p">Pria</option>
                                <option value="w">Wanita</option>
                            </select>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp" id="spvr">
                            <label for="spv">Supervisor</label>
                            <br>
                            <select class="custom-select" name="spv" id="spv">
                                <option value="">Pilih Supervisor</option>
                                <?php foreach ($spv as $spv) { ?>
                                    <option <?= $spv['id'] == old('spv') ? "selected" : ""; ?> value="<?= $spv['id']; ?>"><?= $spv['nama_lengkap']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?/*= $validation->getError('id_kategori');*/ ?>
                            </div>
                        </div>
                        <!-- <div class="form-gp">
                            <label for="alamat">Alamat Asal</label>
                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="alamat_domisili">Alamat Domisili</label>
                            <textarea name="alamat_domisili" id="alamat_domisili" class="form-control"></textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="no_telp">No. Telp</label>
                            <input type="number" name="no_telp" id="no_telp">
                            <i class="ti-telephone"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="no_telp_drt">No. Telp Keluarga / Darurat</label>
                            <input type="number" name="no_telp_drt" id="no_telp_drt">
                            <i class="ti-telephone"></i>
                            <div class="text-danger"></div>
                        </div> -->
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit<i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>