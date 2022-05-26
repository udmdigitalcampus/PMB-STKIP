<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="/admin">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if (in_groups("mahasiswa")) : ?>
                <li>
                    <a href="/pendaftar/formulir">
                        <i class="bx bx-font-family"></i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </li>
                <li>
                    <a href="/pendaftar/data-diri">
                        <i class="bx bx-user-pin"></i>
                        <span data-key="t-dashboard">Data Diri</span>
                    </a>
                </li>
                <li>
                    <a href="/pendaftar/pembayaran">
                        <i class="bx bx-money"></i>
                        <span>Pembayaran Registrasi</span>
                    </a>
                </li>
                <li>
                    <a href="/pendaftar/pengumuman">
                        <i class="bx bx-notification"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>

                <?php else : ?>
                <li>
                    <a href="/admin/data-users">
                        <i class="bx bx-user"></i>
                        <span data-key="t-dashboard">Data Users</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/data-mahasiswa">
                        <i class="bx bx-user-pin"></i>
                        <span data-key="t-dashboard">Data Mahasiswa</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="menu-title" data-key="t-menu">Lain-lain</li>

                <li>
                    <a href="bantuan">
                        <i class="bx bx-question-mark"></i>
                        <span>Bantuan</span>
                    </a>
                </li>
                <li>
                    <a href="tentang">
                        <i class="bx bx-info-circle"></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->