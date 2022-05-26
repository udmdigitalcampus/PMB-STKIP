<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>/assets/images/logo-sm.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>/assets/images/logo-stkipnu.png" alt="" height="34">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url(); ?>/assets/images/logo-sm.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>/assets/images/logo-stkipnu.png" alt="" height="34">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>..."
                                    aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($profil == null) : ?>
                    <img class="rounded-circle header-profile-user"
                        src="<?= base_url(); ?>/assets/images/users/default.png" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?= user()->username; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    <?php else : ?>
                    <img class="rounded-circle header-profile-user"
                        src="<?= base_url(); ?>/assets/images/users/<?= $profil->foto_profil; ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?= user()->username; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    <?php endif; ?>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="apps-contacts-profile"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i>
                        <?= lang('Files.Profile') ?></a>
                    <a class="dropdown-item" href="auth-lock-screen"><i
                            class="mdi mdi-lock font-size-16 align-middle me-1"></i>
                        <?= lang('Files.Lock_screen') ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= route_to('logout'); ?>"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                        <?= lang('Files.Logout') ?></a>
                </div>
            </div>

        </div>
    </div>
</header>