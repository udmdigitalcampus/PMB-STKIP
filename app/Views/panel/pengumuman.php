<?= $this->include('panel/partials/head-main') ?>

<head>

    <?= $title_meta ?>
    <!-- Sweet Alert-->
    <link href="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- alertifyjs Css -->
    <link href="<?= base_url(); ?>/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet"
        type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="<?= base_url(); ?>/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet"
        type="text/css" />
    <!-- DataTables -->
    <link href="<?= base_url(); ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url(); ?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url(); ?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <?= $this->include('panel/partials/head-css') ?>

</head>

<?= $this->include('panel/partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('panel/partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <?= csrf_field() ?>
                <?php if ($profil->profil_id != null ) : ?>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h1 class="text-success">SELAMAT ANDA LULUS !
                        </h1>
                    </div>

                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h2>Sebagai mahasiswa baru STKIP NU Indramayu
                        </h2>
                    </div>
                </div>
                <?php else: ?>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h1 class="text-success">MAAF, ANDA BELUM LULUS !
                        </h1>
                    </div>

                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h2>Silakan mencoba lagi untuk mengikuti test pada gelombang berikutnya.
                        </h2>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row justify-content-center">

                                    <div class="col-xl-10">

                                    </div>
                                    <div class="col-xl-10">
                                        <div class="timeline">
                                            <div class="timeline-container">
                                                <!-- <div class="timeline-start">
                                                    <p>Start</p>
                                                </div> -->
                                                <div class="timeline-continue">
                                                    <div class="row timeline-right">
                                                        <div class="col-md-6">
                                                            <div class="timeline-icon">
                                                                <i
                                                                    class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div
                                                                    class="timeline-date bg-primary text-center rounded">
                                                                    <h3 class="text-white mb-0">25</h3>
                                                                    <p class="mb-0 text-white-50">June</p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-18">Group WA</h3>
                                                                        <p class="mb-0 mt-2 pt-1 text-muted"> Silahkan
                                                                            masuk grup whatsapp, dengan mengeklik tombol
                                                                            dibawah ini <br> <a
                                                                                href="https://chat.whatsapp.com/BlJ4zW0x1SBGv5Wn4020nt"
                                                                                type="button"
                                                                                class="btn btn-primary waves-effect waves-light">
                                                                                <i
                                                                                    class="bx bxl-whatsapp font-size-16 align-middle me-2"></i>
                                                                                Grup Whatssapp
                                                                            </a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if ($profil != null) : ?>
                                                    <div class="row timeline-left">
                                                        <div class="col-md-6 d-md-none d-block">
                                                            <div class="timeline-icon">
                                                                <i class="bx bx-user-pin text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div
                                                                    class="timeline-date bg-primary text-center rounded">
                                                                    <h3 class="text-white mb-0">25</h3>
                                                                    <p class="mb-0 text-white-50">June</p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-18">Jadwal Ujian</h3>
                                                                        <?php if (strtotime($profil->created_at) < strtotime('2022-3-17')) : ?>
                                                                        <p class="mb-0 mt-2 pt-1 text-muted">Silakan
                                                                            mengikuti ujian gelombang 1 pada 19 Maret
                                                                            2022 dengan
                                                                            berpakaian putih hitam dan sepatu.</p>
                                                                        <?php elseif (strtotime($profil->created_at) >= strtotime('2022-3-17') and strtotime($profil->created_at) <= strtotime('2022-5-26')) : ?>
                                                                        <p class="mb-0 mt-2 pt-1 text-muted">Silakan
                                                                            mengikuti ujian gelombang 2 pada 28 Mei
                                                                            2022 dengan
                                                                            berpakaian putih hitam dan sepatu.</p>
                                                                        <?php elseif (strtotime($profil->created_at) >= strtotime('2022-5-26') and strtotime($profil->created_at) <= strtotime('2022-8-11')) : ?>
                                                                        <p class="mb-0 mt-2 pt-1 text-muted">Silakan
                                                                            mengikuti ujian gelombang 2 pada 13 Agustus
                                                                            2022 dengan
                                                                            berpakaian putih hitam dan sepatu.</p>
                                                                        <?php endif; ?>
                                                                        <div
                                                                            class="d-flex flex-wrap align-items-start event-img mt-3 gap-2">
                                                                            <img src="assets/images/small/img-2.jpg"
                                                                                alt="" class="img-fluid rounded"
                                                                                width="60">
                                                                            <img src="assets/images/small/img-5.jpg"
                                                                                alt="" class="img-fluid rounded"
                                                                                width="60">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-md-block d-none">
                                                            <div class="timeline-icon">
                                                                <i class="bx bx-user-pin text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="timeline-end">
                                                    <p>End</p>
                                                </div>
                                                <!-- <div class="timeline-launch">
                                                    <div class="timeline-box">
                                                        <div class="timeline-text">
                                                            <h3 class="font-size-18">Launched our company on 21 June
                                                                2021</h3>
                                                            <p class="text-muted mb-0">Pellentesque sapien ut est.</p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?= $this->include('panel/partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('panel/partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('panel/partials/vendor-scripts') ?>

<!-- Sweet Alerts js -->
<script src="<?= base_url(); ?>/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<script src="<?= base_url(); ?>/assets/libs/alertifyjs/build/alertify.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script>
function ambil_data() {
    $("#datatable").DataTable({
        "destroy": true,
    }).clear();

    $.ajax({
        url: "<?= route_to('admin/data-users-datatable') ?>",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data: {
            'csrf_token_name': $('input[name=csrf_token_name]').val()
        },
        type: "get",
        dataType: "json",
        method: "get",
        success: function(data) {
            // console.log(data);
            $('#no').val(data.posts.length);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.responce == "success") {
                $("#datatable").DataTable({
                    "destroy": true,
                    "data": data.posts,
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }],
                    "language": {
                        "emptyTable": "Tidak ada data tagihan"
                    },
                    "buttons": [{
                            extend: 'copy',
                            text: 'Copy to clipboard'
                        },
                        'excel',
                        'pdf'
                    ],
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo(
                    '#datatable_wrapper .col-md-6:eq(0)');
            } else {

            }
        }
    });
}
$(document).ready(function() {
    ambil_data();
});
</script>

<script>
$(document).on('click', '#button-entri', function(e) {
    var data = {
        'csrf_token_name': $('input[name=csrf_token_name]').val(),
        'email': $('.email').val(),
        'username': $('.username').val(),
        'password': $('.password').val(),
        'pass_confirm': $('.pass_confirm').val(),
        'group': $('.group').val(),
    }

    // console.log(data);
    $.ajax({
        url: "<?= route_to('admin/data-users-add') ?>",
        type: "POST",
        data: data,
        // global: false,
        // async: false,
        beforeSend: function() {
            $('#button-entri').removeAttr('disable');
            $('#button-entri').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function(e) {
            $('#button-entri').prop('disable', 'disable');
            $('#button-entri').html('Submit');
        },
        success: function(data) {
            // console.log(data);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.email != undefined) {
                alertify.error(data.email);
            } else if (data.username != undefined) {
                alertify.error(data.username);
            } else if (data.password != undefined) {
                alertify.error(data.password);
            } else if (data.group != undefined) {
                alertify.error(data.group);
            } else if (data.message != undefined) {
                alertify.success(data.message);
                $('.entrimanual').modal('hide');
                ambil_data();
            }
        }
    });
});
</script>

<script src="<?= base_url(); ?>/assets/js/app.js"></script>

</body>

</html>