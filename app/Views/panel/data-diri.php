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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card h-90">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <img src="/assets/images/users/<?= $profil->foto_profil; ?>" alt=""
                                            class="img-thumbnail rounded" height="100" width="150">
                                    </div>
                                    <h5 class="mt-3 mb-2"></h5>

                                </div>

                                <hr class="my-4">

                                <div class="text-muted">
                                    <div class="table-responsive mt-4">
                                        <div>
                                            <p class="mb-1">Username</p>
                                            <h5 class="font-size-16"><?= user()->username; ?></h5>
                                            <hr>
                                            <p class="mb-1">Email</p>
                                            <h5 class="font-size-16"><?= user()->email; ?></h5>
                                            <hr>
                                            <p class="mb-1">No HP</p>
                                            <h5 class="font-size-16"><?= $profil->no_hp; ?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Calon Mahasiswa STKIP NU INDRAMAYU</h4>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="dari" class="form-label">Siapa yang merekomendasikan anda
                                                ?</label>
                                            <input class="form-control" type="text" id="dari"
                                                placeholder="Tidak wajib diisi">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="jurusan" class="form-label">Program Studi yang
                                                Dipilih</label>
                                            <input class="form-control" id="jurusan" value="<?= $profil->jurusan; ?>"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                            <input class="form-control" type="text" id="nama_lengkap"
                                                value="<?= $profil->nama_lengkap; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">Nomor Induk
                                                Kependudukan (NIK)</label>
                                            <input minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="nik" value="<?= $profil->nik; ?>"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">Nomor Induk
                                                Sekolah Nasional (NISN)</label>
                                            <input minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="nik"
                                                value="<?= $profil->nisn; ?>" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">Nomor Pokok
                                                Sekolah Nasional (NPSN)</label>
                                            <input minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="nik"
                                                value="<?= $profil->npsn; ?>" disabled>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="agama" class="form-label">Agama</label>
                                                <input class="form-control" id="agama" value="<?= $profil->agama; ?>"
                                                    disabled>

                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                <input class="form-control" id="jenis_kelamin"
                                                    value="<?= $profil->jenis_kelamin; ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input class="form-control" type="text" id="tempat_lahir"
                                                    value="<?= $profil->tempat_lahir; ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" type="date" id="tanggal_lahir"
                                                    value="<?= $profil->tanggal_lahir; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                            <input class="form-control" type="text" id="nama_ayah"
                                                value="<?= $profil->nama_ayah; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                            <input class="form-control" type="text" id="nama_ibu"
                                                value="<?= $profil->nama_ibu; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">Nomor HP</label>
                                            <input class="form-control" type="text" id="no_hp"
                                                value="<?= $profil->no_hp; ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                                            <input class="form-control" type="text" id="alamat"
                                                placeholder="Jalan, Blok, dan RT/RW" value="<?= $profil->alamat; ?>"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                                            <input class="form-control" type="text" id="sekolah_asal"
                                                value="<?= $profil->sekolah_asal; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="jurusan_sekolah_asal" class="form-label">Jurusan Sekolah
                                                Asal</label>
                                            <input class="form-control" type="text" id="jurusan_sekolah_asal"
                                                value="<?= $profil->jurusan_sekolah_asal; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="tahun_lulus" class="form-label">Tahun
                                                Lulus</label>
                                            <input class="form-control" type="number" id="tahun_lulus"
                                                value="<?= $profil->tahun_lulus; ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <h1>ANDA BELUM MENGISI FORMULIR PENDAFTARAN</MEta:edge>
                        </h1>
                    </div>

                    <div class="col-lg-12 d-flex justify-content-center mb-3">
                        <H4>Silakan mengisi formulir pendaftaran pada menu yang sudah disediakan atau klik tombol
                            dibawah ini.
                            ini</H4>
                    </div>

                    <div class="col-lg-12 d-flex justify-content-center">
                        <h3><a href="/pendaftar/formulir" type="button" class="btn btn-outline-primary"><i
                                    class=" bx bx-pencil"> Formulir Pendaftaran</a></i> </h3>
                    </div>
                </div>
                <?php endif; ?>


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

<script>
function preview() {
    var file = $("#foto_profil").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $("#preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}

function add() {
    let foto_profil = $('#foto_profil').prop('files')[0];
    let foto_ktp = $('#foto_ktp').prop('files')[0];
    let foto_kk = $('#foto_kk').prop('files')[0];
    let foto_akta = $('#foto_akta').prop('files')[0];
    let foto_izazah = $('#foto_izazah').prop('files')[0];
    let foto_ktp_orangtua = $('#foto_ktp_orangtua').prop('files')[0];
    let fd = new FormData();
    fd.append('jurusan', $('#jurusan').val());
    fd.append('nik', $('#nik').val());
    fd.append('nama_lengkap', $('#nama_lengkap').val());
    fd.append('jenis_kelamin', $('#jenis_kelamin').val());
    fd.append('agama', $('#agama').val());
    fd.append('tempat_lahir', $('#tempat_lahir').val());
    fd.append('tanggal_lahir', $('#tanggal_lahir').val());
    fd.append('nama_ayah', $('#nama_ayah').val());
    fd.append('nama_ibu', $('#nama_ibu').val());
    fd.append('no_hp', $('#no_hp').val());
    fd.append('alamat', $('#alamat').val());
    fd.append('provinsi', $('#provinsi :selected').text());
    fd.append('kabupaten', $('#kabupaten :selected').text());
    fd.append('kecamatan', $('#kecamatan :selected').text());
    fd.append('desa', $('#desa :selected').text());
    fd.append('sekolah_asal', $('#sekolah_asal').val());
    fd.append('jurusan_sekolah_asal', $('#jurusan_sekolah_asal').val());
    fd.append('tahun_lulus', $('#tahun_lulus').val());
    fd.append('foto_profil', foto_profil);
    fd.append('foto_ktp', foto_ktp);
    fd.append('foto_kk', foto_kk);
    fd.append('foto_akta', foto_akta);
    fd.append('dari', $('#dari').val());
    fd.append('foto_izazah', foto_izazah);
    fd.append('foto_ktp_orangtua', foto_ktp_orangtua);
    fd.append('csrf_token_name', $('input[name=csrf_token_name]').val());

    $.ajax({
        type: "post",
        url: "<?= route_to('pendaftar/add-formulir') ?>",
        data: fd,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $('#button-entri').removeAttr('disable');
            $('#button-entri').html('<i class="fa fa-spin fa-spinner"></i>');
        },
        complete: function(e) {
            $('#button-entri').prop('disable', 'disable');
            $('#button-entri').html('Submit');
        },
        success: function(data) {
            console.log(data);
            $('input[name=csrf_token_name]').val(data.csrf_token_name);
            if (data.jurusan != undefined) {
                alertify.error(data.jurusan);
            } else if (data.nama_lengkap != undefined) {
                alertify.error(data.nama_lengkap);
            } else if (data.agama != undefined) {
                alertify.error(data.agama);
            } else if (data.nik != undefined) {
                alertify.error(data.nik);
            } else if (data.jenis_kelamin != undefined) {
                alertify.error(data.jenis_kelamin);
            } else if (data.tempat_lahir != undefined) {
                alertify.error(data.tempat_lahir);
            } else if (data.tanggal_lahir != undefined) {
                alertify.error(data.tanggal_lahir);
            } else if (data.nama_ayah != undefined) {
                alertify.error(data.nama_ayah);
            } else if (data.nama_ibu != undefined) {
                alertify.error(data.nama_ibu);
            } else if (data.no_hp != undefined) {
                alertify.error(data.no_hp);
            } else if (data.alamat != undefined) {
                alertify.error(data.alamat);
            } else if (data.provinsi != undefined) {
                alertify.error(data.provinsi);
            } else if (data.kabupaten != undefined) {
                alertify.error(data.kabupaten);
            } else if (data.kecamatan != undefined) {
                alertify.error(data.kecamatan);
            } else if (data.desa != undefined) {
                alertify.error(data.desa);
            } else if (data.sekolah_asal != undefined) {
                alertify.error(data.sekolah_asal);
            } else if (data.jurusan_sekolah_asal != undefined) {
                alertify.error(data.jurusan_sekolah_asal);
            } else if (data.tahun_lulus != undefined) {
                alertify.error(data.tahun_lulus);
            } else if (data.foto_profil != undefined) {
                alertify.error(data.foto_profil);
            } else if (data.foto_ktp != undefined) {
                alertify.error(data.foto_ktp);
            } else if (data.foto_kk != undefined) {
                alertify.error(data.foto_kk);
            } else if (data.foto_akta != undefined) {
                alertify.error(data.foto_akta);
            } else if (data.foto_izazah != undefined) {
                alertify.error(data.foto_izazah);
            } else if (data.foto_ktp_orangtua != undefined) {
                alertify.error(data.foto_ktp_orangtua);
            } else if (data.error != undefined) {
                Swal.fire({
                    title: 'Error!',
                    text: error,
                    icon: 'error',
                    confirmButtonColor: '#5156be',
                });
            } else if (data.success != undefined) {
                Swal.fire({
                    title: 'Submited!',
                    text: 'Your file has been submited.',
                    icon: 'success',
                    confirmButtonColor: '#5156be',
                }, function() {
                    console.log("hello");
                }, 1000);
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error);
        }
    });
}
$(document).ready(function(e) {
    $('#button-entri').click(function() {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                add();
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire({
                    title: 'Cancelled',
                    text: 'You cancelled this action :)',
                    icon: 'error',
                    confirmButtonColor: '#5156be',
                })
            }
        });

    });
})
</script>

<script>
$(document).ready(function(e) {
    $.ajax({
        method: "get",
        url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
        success: function(data) {
            // console.log(data);
            $('#provinsi').append('<option value=>Select</option>');
            ldata = data.provinsi.length;
            for (let i = 0; i < ldata; i++) {
                $('#provinsi').append('<option value=' + data.provinsi[i].id + '>' + data.provinsi[
                        i].nama +
                    '</option>')
            }
        }
    });
});

function getKabupaten() {
    var idprov = $('#provinsi').val();
    // console.log($('#provinsi :selected').text());
    $.ajax({
        method: "get",
        url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + idprov,
        success: function(data) {
            ldata = data.kota_kabupaten.length;
            $('#kabupaten').append('<option value=>Select</option>');
            for (let i = 0; i < ldata; i++) {
                $('#kabupaten').append('<option value=' + data.kota_kabupaten[i].id + '>' +
                    data.kota_kabupaten[i].nama + '</option>')
            }
        }
    });
}

function getKecamatan() {
    var idkota = $('#kabupaten').val();
    $.ajax({
        method: "get",
        url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + idkota,
        success: function(data) {
            // console.log(data);
            $('#kecamatan').append('<option value=>Select</option>');
            ldata = data.kecamatan.length;
            for (let i = 0; i < ldata; i++) {
                $('#kecamatan').append('<option value=' + data.kecamatan[i].id + '>' + data.kecamatan[i]
                    .nama + '</option>')
            }
        }
    });
}

function getDesa() {
    var idkec = $('#kecamatan').val();
    $.ajax({
        method: "get",
        url: "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + idkec,
        success: function(data) {
            ldata = data.kelurahan.length;
            $('#desa').append('<option value=>Select</option>');
            for (let i = 0; i < ldata; i++) {
                $('#desa').append('<option value=' + data.kelurahan[i].id + '>' + data.kelurahan[i].nama +
                    '</option>')
            }
        }
    });
}
</script>

<script src="<?= base_url(); ?>/assets/js/app.js"></script>

</body>

</html>