<p>Seseorang mengajukan permintaan reset kata sandi pada email ini untuk <?= site_url() ?>.</p>

<p>Untuk melakukan reset kata sandi silakan gunakan kode berikut dan ikuti instruksinya.</p>

<p>Kode kamu: <?= $hash ?></p>

<p>Kunjungi <a href="<?= site_url('reset-password') . '?token=' . $hash ?>">Reset Form</a>.</p>

<br>

<p>Jika kamu tidak mengajukan permintaan reset kata sandi, silakan abaikan email ini.</p>