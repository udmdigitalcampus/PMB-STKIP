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
                <?php if ($profil != null) : ?>
                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h1>STATUS PEMBAYARAN ANDA
                        </h1>
                    </div>


                    <?php if ($status_bayar == "pending") : ?>
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h4><span class="badge bg-warning">Pending</span></h4>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a href="<?= $pdf_link; ?>" target="_blank" type="button"
                            class="btn btn-info waves-effect btn-label waves-light"><i
                                class="bx bx-info-circle label-icon"></i> Download Petunjuk Pembayaran</a>
                    </div>
                    <?php elseif ($status_bayar == "settlement") : ?>
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h4><span class="badge bg-success">Sudah dibayar</span></h4>
                    </div>
                    <?php elseif ($status_bayar == null) : ?>
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h4><span class="badge bg-danger">Belum dibayar</span></h4>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <button type="button" id="pay-button" class="btn btn-info waves-effect btn-label waves-light"><i
                                class="bx bx-money label-icon"></i> Bayar Sekarang</button>
                    </div>
                    <?php else : ?>
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h4><span class="badge bg-danger"><?= $status_bayar; ?></span></h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

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

<script src="https://app.midtrans.com/snap/snap.js" data-client-key="<?= $clientKey; ?>">
</script>
<script type="text/javascript">
document.getElementById('pay-button').onclick = function() {
    // SnapToken acquired from previous step
    snap.pay('<?php echo $snap_token ?>', {
        // Optional
        onSuccess: function(result) {

            var data = {
                'payment_type': result.payment_type,
                'order_id': result.order_id,
                'status': result.transaction_status,
                'bank': result.va_numbers[0].bank,
                'va_number': result.va_numbers[0].va_number,
                'pdf_link': result.pdf_url,
                'gross_amount': result.gross_amount,
                'csrf_token_name': $('input[name=csrf_token_name]').val()
            }

            console.log(result);

            $.ajax({
                type: "post",
                url: "<?= route_to('pendaftar/pembayaran-add') ?>",
                data: data,
                // processData: false,
                // contentType: false,
                success: function(data) {
                    console.log(data);
                    $('input[name=csrf_token_name]').val(data.csrf_token_name);
                },
                error: function(error) {
                    console.log("Error:");
                    console.log(error);
                }
            });
        },
        // Optional
        onPending: function(result) {
            /* You may add your own js here, this is just example */
            console.log(result);
            if (result.va_numbers != null) {
                var data = {
                    'payment_type': result.payment_type,
                    'order_id': result.order_id,
                    'gross_amount': result.gross_amount,
                    'status': result.transaction_status,
                    'bank': result.va_numbers[0].bank,
                    'va_number': result.va_numbers[0].va_number,
                    'pdf_link': result.pdf_url,
                    'csrf_token_name': $('input[name=csrf_token_name]').val()
                }
            } else {
                var data = {
                    'payment_type': result.payment_type,
                    'order_id': result.order_id,
                    'gross_amount': result.gross_amount,
                    'status': result.transaction_status,
                    'pdf_link': result.pdf_url,
                }
            }
            // console.log(data);

            $.ajax({
                type: "post",
                url: "<?= route_to('pendaftar/pembayaran-add') ?>",
                data: data,
                // processData: false,
                // contentType: false,
                success: function(data) {
                    // console.log(data);
                    location.reload();
                },
                error: function(error) {
                    console.log("Error:");
                    console.log(error);
                }
            });
        },
        // Optional
        onError: function(result) {
            /* You may add your own js here, this is just example */
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
    });
};
</script>

<script>

</script>

<script src="<?= base_url(); ?>/assets/js/app.js"></script>

</body>

</html>