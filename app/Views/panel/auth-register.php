<?= $this->include('panel/partials/head-main') ?>

<head>

    <meta charset="utf-8" />
    <title>Login | PMB STKIP NU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Penerimaan mahasiswa baru STKIP NU Indramayu" name="description" />
    <meta content="Chaerul Anam" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.ico">

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
                                    <img src="<?= base_url(); ?>/assets/images/logo-stkipnu.png" alt="" height="45">
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Daftar Akun</h5>
                                    <p class="text-muted mt-2">Silahkan isi form di bawah ini untuk mendaftar.</p>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>


                                <form action="<?= route_to('register') ?>" method="post"
                                    class="needs-validation custom-form mt-4 pt-2" novalidate action="/">
                                    <?= csrf_field() ?>
                                    <div class="form-group mb-3">
                                        <label for="email"><?= lang('Auth.email') ?></label>
                                        <input type="email"
                                            class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                            name="email" aria-describedby="emailHelp"
                                            placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>"
                                            required>
                                        <small id="emailHelp"
                                            class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="username"><?= lang('Auth.username') ?></label>
                                        <input oninput="this.value = this.value.toLowerCase()" type="text"
                                            class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                            name="username" placeholder="<?= lang('Auth.username') ?>"
                                            value="<?= old('username') ?>" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="username">Nomor Hp</label>
                                        <input oninput="this.value = this.value.toLowerCase()" type="text"
                                            class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>"
                                            name="no_hp" placeholder="Nomor Hp" value="<?= old('no_hp') ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><?= lang('Auth.password') ?></label>
                                    </div>
                                    <div class="input-group auth-pass-inputgroup mb-3">
                                        <input type="password" name="password"
                                            class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?= lang('Auth.password') ?>" autocomplete="off"
                                            aria-label="password" aria-describedby="password-addon">
                                        <button class="btn btn-light ms-0" type="button" id="password-addon"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>

                                    <div class="form-group">
                                        <label for="password"><?= lang('Auth.repeatPassword') ?></label>
                                    </div>
                                    <div class="input-group auth-pass-inputgroup mb-3">
                                        <input type="password" name="pass_confirm"
                                            class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?= lang('Auth.password') ?>" autocomplete="off"
                                            aria-label="password" aria-describedby="password-addon-1">
                                        <button class="btn btn-light ms-0" type="button" id="password-addon-1"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-0">Mendaftar artinya anda setuju dengan <a href="#"
                                                class="text-primary">Terms of Use STKIP NU INDRAMAYU</a></p>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>
                                </form>

                                <!-- <div class="mt-4 pt-2 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign up using -</h5>
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

                                <div class="mt-5 text-center">
                                    <p class="text-muted mb-0">Sudah punya akun ? <a href="<?= route_to('login') ?>"
                                            class="text -primary fw-semibold"> Login </a> </p>
                                </div>
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
                                                            <img src="<?= base_url(); ?>/assets/images/users/avatar-1.jpg"
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
                                                            <img src="<?= base_url(); ?>/assets/images/users/avatar-2.jpg"
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
                                                        <img src="<?= base_url(); ?>/assets/images/users/avatar-3.jpg"
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
<script src="assets/js/pages/pass-addon.init.js"></script>

<!-- validation init -->
<script src="<?= base_url(); ?>/assetsjs/pages/validation.init.js"></script>

</body>

</html>