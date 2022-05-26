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

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->
                <?php if ($profil == null) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Formulir Pendaftaran Mahasiswa STKIP NU INDRAMAYU</h4>
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
                                            <select class="form-select" id="jurusan">
                                                <option value=>--Pilih--</option>
                                                <option value="86206">Pendidikan Guru Sekolah Dasar (PGSD)</option>
                                                <option value="88201">Pendidikan Bahasa dan Sastra Indonesia (PBSI)
                                                </option>
                                                <option value="85201">Pendidikan Jasmani, Olahraga, Kesehatan dan
                                                    Rekreasi (PJKR)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                            <input class="form-control" type="text" id="nama_lengkap">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" id="jenis_kelamin">
                                                <option value=>--Pilih--</option>
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">Nomor Induk
                                                Kependudukan (NIK)</label>
                                            <input minlength="12" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="nik">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nisn" class="form-label">Nomor Induk Siswa Nasional
                                                (NISN)</label>
                                            <input minlength="0" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="nisn">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="npsn" class="form-label">Nomor Pokok
                                                Sekolah Nasional (NPSN)</label>
                                            <input minlength="0" maxlength="16"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                class="form-control" type="number" id="npsn">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="agama" class="form-label">Agama</label>
                                            <select class="form-select" id="agama">
                                                <option value=>--Pilih--</option>
                                                <option>Islam</option>
                                                <option>Kristen Protestan</option>
                                                <option>Kristen Katholik</option>
                                                <option>Hindu</option>
                                                <option>Budha</option>
                                                <option>Konghuchu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input class="form-control" type="text" id="tempat_lahir">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input class="form-control" type="date" id="tanggal_lahir">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                            <input class="form-control" type="text" id="nama_ayah">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                            <input class="form-control" type="text" id="nama_ibu">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">Nomor HP</label>
                                            <input class="form-control" type="text" id="no_hp">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                                            <input class="form-control" type="text" id="alamat"
                                                placeholder="Jalan, Blok, dan RT/RW">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Provinsi</label>
                                            <select class="form-select" id="provinsi" onchange="getKabupaten()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Kabupaten</label>
                                            <select class="form-select" id="kabupaten" onchange="getKecamatan()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Kecamatan</label>
                                            <select class="form-select" id="kecamatan" onchange="getDesa()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Desa / Kelurahan</label>
                                            <select class="form-select" id="desa">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                                            <input class="form-control" type="text" id="sekolah_asal">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="jurusan_sekolah_asal" class="form-label">Jurusan Sekolah
                                                Asal</label>
                                            <input class="form-control" type="text" id="jurusan_sekolah_asal">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="tahun_lulus" class="form-label">Tahun
                                                Lulus</label>
                                            <input class="form-control" type="number" id="tahun_lulus">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="col-lg-3 mb-3">
                                            <label for="foto_profil" class="form-label">Foto Profil</label>
                                            <input type="file" class="form-control" id="foto_profil"
                                                onchange="preview()">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="mb-3">
                                            <div class="mx-auto">
                                                <img src="<?= base_url(); ?>/assets/images/users/default.png" alt=""
                                                    class="avatar-xl rounded img-thumbnail" id="preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_ktp" class="form-label">KTP / Kartu Identitas
                                                Lainya</label>
                                            <input type="file" class="form-control" id="foto_ktp">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_kk" class="form-label">Foto Kartu Keluarga</label>
                                            <input type="file" class="form-control" id="foto_kk">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_akta" class="form-label">Foto Akta Lahir</label>
                                            <input type="file" class="form-control" id="foto_akta">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_ijazah" class="form-label">Foto Ijazah / SK
                                                Lulus / Aktif Sekolah</label>
                                            <input type="file" class="form-control" id="foto_ijazah">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_ktp_ayah" class="form-label">Foto KTP Ayah /
                                                Wali</label>
                                            <input type="file" class="form-control" id="foto_ktp_ayah">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="foto_ktp_ibu" class="form-label">Foto KTP Ibu /
                                                Wali</label>
                                            <input type="file" class="form-control" id="foto_ktp_ibu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Semua ukuran file maksimal 2MB</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="d-grid gap-2 col-3 mx-auto mt-3">
                                            <button type="submit" class="btn btn-info" id="button-entri"> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="col-lg-12 d-flex justify-content-center mb-3">
            <h4>Anda Sudah Mengisi Formulir dan Akan Diarahkan Ke halaman Data Diri
            </h4>
        </div>
        <meta http-equiv="refresh" content="3;url=/pendaftar/data-diri">
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
    let foto_ijazah = $('#foto_ijazah').prop('files')[0];
    let foto_ktp_ayah = $('#foto_ktp_ayah').prop('files')[0];
    let foto_ktp_ibu = $('#foto_ktp_ibu').prop('files')[0];

    let fd = new FormData();
    fd.append('dari', $('#dari').val());
    fd.append('jurusan', $('#jurusan').val());
    fd.append('nik', $('#nik').val());
    fd.append('nisn', $('#nisn').val());
    fd.append('npsn', $('#npsn').val());
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
    fd.append('foto_ijazah', foto_ijazah);
    fd.append('foto_ktp_ayah', foto_ktp_ayah);
    fd.append('foto_ktp_ibu', foto_ktp_ibu);
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
            } else if (data.nisn != undefined) {
                alertify.error(data.nisn);
            } else if (data.npsn != undefined) {
                alertify.error(data.npsn);
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
            } else if (data.foto_ijazah != undefined) {
                alertify.error(data.foto_ijazah);
            } else if (data.foto_ktp_ayah != undefined) {
                alertify.error(data.foto_ktp_ayah);
            } else if (data.foto_ktp_ibu != undefined) {
                alertify.error(data.foto_ktp_ibu);
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
                    text: 'Your file has been submited. Will Reload in 1 second',
                    icon: 'success',
                    timer: 1000,
                    confirmButtonColor: '#5156be',
                }).then(function() {
                    location.reload();
                });
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
            title: 'Anda Yakin?',
            text: "Pastikan semuanya benar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Submit!',
            cancelButtonText: 'Tidak, Batalkan!',
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
    $('#kabupaten').find('option').remove().end()
    $('#kecamatan').find('option').remove().end()
    $('#desa').find('option').remove().end()
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
    $('#kecamatan').find('option').remove().end()
    $('#desa').find('option').remove().end()
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
    $('#desa').find('option').remove().end()
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