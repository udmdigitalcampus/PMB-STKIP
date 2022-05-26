<?= $this->include('panel/partials/head-main') ?>

<head>

    <meta charset="utf-8" />
    <title>Coming Soon | PMB STKIP NU INDRAMAYU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PMB STKIP NU INDRAMAYU JAWA BARAT, PENDAFTARAN MAHASISWA BARU STKIP NU" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico">

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/libs/swiper/swiper-bundle.min.css">

    <?= $this->include('panel/partials/head-css') ?>

</head>

<?= $this->include('panel/partials/body') ?>

<!-- <body data-layout="horizontal"> -->
<div class="preview-img">
    <div class="swiper-container preview-thumb">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-1.jpg);"></div>
            </div>
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-2.jpg);"></div>
            </div>
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url(./assets/images/bg-3.jpg);"></div>
            </div>
        </div>
    </div>
    <!-- preview-thumb -->
    <div class="swiper-container preview-thumbsnav">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div>
                    <img src="<?= base_url(); ?>/assets/images/bg-1.jpg" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
            <div class="swiper-slide">
                <div>
                    <img src="<?= base_url(); ?>/assets/images/bg-2.jpg" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
            <div class="swiper-slide">
                <div>
                    <img src="<?= base_url(); ?>/assets/images/bg-3.jpg" alt=""
                        class="avatar-sm nav-img rounded-circle">
                </div>
            </div>
        </div>
    </div>
    <!-- preview-thumb -->
</div>
<!-- preview bg -->

<div class="coming-content min-vh-100 py-4 px-3 py-sm-5">
    <div class="bg-overlay bg-primary"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center py-4 py-sm-5">

                    <div class="mb-5">
                        <a href="/">
                            <img src="<?= base_url(); ?>/assets/images/logo-stkipnu.png" alt="" height="45"
                                class="me-1">
                        </a>
                    </div>
                    <h3 class="text-white mt-5">PENDAFTARAN MAHASISWA BARU STKIP NU INDRAMAYU</h3>
                    <p class="text-white-50 font-size-16">Pendaftaran akan dibuka dalam</p>

                    <div data-countdown="<?= $waktu_dibuka; ?>" class="counter-number mt-5"></div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- coming-content -->

<!-- JAVASCRIPT -->
<?= $this->include('panel/partials/vendor-scripts') ?>
<!-- swiper js -->
<script src="<?= base_url(); ?>/assets/libs/swiper/swiper-bundle.min.js"></script>
<!-- Plugins js-->
<script src="<?= base_url(); ?>/assets/libs/jquery-countdown/jquery.countdown.min.js"></script>

<!-- Countdown js -->
<script src="<?= base_url(); ?>/assets/js/pages/coming-soon.init.js"></script>
</body>

</html>