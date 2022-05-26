<?= $this->include('panel/partials/head-main') ?>

<head>

    <meta charset="utf-8" />
    <title>Login | PMB STKIP NU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Penerimaan mahasiswa baru STKIP NU Indramayu" name="description" />
    <meta content="Chaerul Anam" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <?= $this->include('panel/partials/head-css') ?>

</head>

<?= $this->include('panel/partials/body') ?>

<!-- <body data-layout="horizontal"> -->
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="/" class="d-block auth-logo">
                                    <img src="assets/images/logo-stkipnu.png" alt="" height="45">
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    <p class="text-muted mt-2">Silakan masuk bagi yang sudah memiliki akun jika belum
                                        klik "Daftar Sekarang".</p>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form class="custom-form mt-4 pt-2" action="<?= route_to('login') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <?php if ($config->validFields === ['email']) : ?>
                                    <div class="form-group mb-3">
                                        <label for="login"><?= lang('Auth.email') ?></label>
                                        <input type="email"
                                            class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            name="login" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                    <?php else : ?>
                                    <div class="form-group mb-3">
                                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                        <input type="text"
                                            class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                            name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label"><?= lang('Auth.password') ?></label>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="">
                                                    <a href="<?= route_to('forgot') ?>"
                                                        class="text-muted"><?= lang('Auth.forgotYourPassword') ?></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password"
                                                class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                placeholder="<?= lang('Auth.password') ?>" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <?php if ($config->allowRemembering) : ?>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input"
                                                <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <?= lang('Auth.rememberMe') ?>
                                        </label>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>
                                </form>

                                <!-- <div class="mt-4 pt-2 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                    </div>

                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void()"
                                                class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                                <?php if ($config->allowRegistration) : ?>
                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Belum punya akun ? <a href="<?= route_to('register') ?>"
                                            class="text-primary fw-semibold"> Daftar
                                            Sekarang </a> </p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                    document.write(new Date().getFullYear())
                                    </script> STKIP NU INDRAMAYU</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-secondary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div
                                        class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Saya sangat beruntung
                                                    dapat kuliah di STKIP NU indramayu, meskipun jauh tetapi fasilitas
                                                    dan pendidikan sangat berkualitas.”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-1.jpg"
                                                                class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Imanuel Selan
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Mahasiswa Asal Kupang NTT</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Kampusnya bagus, serba
                                                    hijau dan juga adem sehingga membuat belajar jadi nyaman.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg"
                                                                class="avatar-md img-fluid rounded-circle" alt="...">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Abdul Mufid
                                                            </h5>
                                                            <p class="mb-0 text-white-50">Mahasiswa Asal Indramayu</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Cari-cari kampus berbasis
                                                    islam di indramayu langsung ketemu STKIP NU, coba daftar disini
                                                    sampai akhirnya ketrima dan sekarang menjalani sebagai mahasiswa,
                                                    disini bisa meraih berbagai prestasi.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    <div class="d-flex align-items-start">
                                                        <img src="assets/images/users/avatar-3.jpg"
                                                            class="avatar-md img-fluid rounded-circle" alt="...">
                                                        <div class="flex-1 ms-3 mb-4">
                                                            <h5 class="font-size-18 text-white">Jazirotul Jannah</h5>
                                                            <p class="mb-0 text-white-50"> Mahasiswa Asal Indramayu
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->
<?= $this->include('panel/partials/vendor-scripts') ?>
<!-- password addon init -->
<script src="assets/js/pages/pass-addon.init.js"></script>

</body>

</html>