<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use App\Models\StatusMhsModel;
use CodeIgniter\HTTP\ResponseTrait;
use Myth\Auth\Config\Auth as AuthConfig;

class DataMahasiswa extends BaseController
{

	use ResponseTrait;
	protected $auth;
	protected $config;

	public function __construct()
	{
		$this->profilModel = new ProfilModel();
		$this->pembayaranModel = new PembayaranModel();
		$this->statusmhsModel = new StatusMhsModel();
		$this->auth = service('authentication');
		$this->auth = service('authorization');
	}
	public function index()
	{

		$data = [
			'users' => $this->userModel
				->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
				->join('auth_groups', 'auth_groups_users.group_id = auth_groups.id')
				->where('name', 'none')->findAll(),
			'profil' => $this->userModel->join('profil', 'profil.user_id = users.id')->find(user_id()),
			'title_meta' => view('panel/partials/title-meta', ['title' => 'Data Mahasiswa']),
			'page_title' => view('panel/partials/page-title', ['title' => 'Data Mahasiswa', 'li_1' => 'PMB STKIP NU INDRAMAYU', 'li_2' => 'Data Mahasiswa'])
		];

		return view('panel/data-mahasiswa', $data);
	}

	public function datatable()
	{
		if ($this->request->isAJAX()) {
			$csrfname = csrf_token();
			$csrfhash = csrf_hash();
			$jurusan = $this->request->getGet('jurusan');
			if ($jurusan != null) {
				$post = $this->profilModel
					->select('profil.id, profil_id, jurusan_id, email, nama_lengkap, jurusan.jurusan, nisn, npsn, jenis_kelamin, foto_profil, izazah, ktp, ktp_ayah, ktp_ibu, dari')
					->join('status_mhs', 'status_mhs.profil_id = profil.id', 'LEFT')
					->join('jurusan', 'profil.jurusan = jurusan.jurusan_id')
					->join('users', 'profil.id = users.id')
					->orderBy('profil.id', 'DESC')
					->where('profil.jurusan', $jurusan)->findAll();
			} else {
				$post = $this->profilModel
					->select('profil.id, jurusan_id, email, nama_lengkap, profil_id, jurusan.jurusan, nisn, npsn, jenis_kelamin, foto_profil, izazah, ktp, ktp_ayah, ktp_ibu, dari')
					->join('jurusan', 'profil.jurusan = jurusan.jurusan_id')
					->join('users', 'profil.id = users.id')
					->orderBy('profil.id', 'DESC')
					->join('status_mhs', 'status_mhs.profil_id = profil.id', 'LEFT')->findAll();
			}
			if ($post) {
				$no = 0;

				foreach ($post as $key) {
					$no++;
					$row = array();
					if ($key->profil_id == 0) {
						$row[] = '<input type="checkbox" class="form-check-input check' . $no . '" id="check" data-no="' . $no . '" data-mahasiswa-id="' . $key->id . '" data-jurusan="' . $key->jurusan_id . '">';
					} else {
						$row[] = '';
					}
					$row[] = $key->nama_lengkap;
					$row[] = $key->jurusan;
					// $row[] = $key->agama;
					$row[] = $key->nisn;
					// $row[] = $key->npsn;
					// $row[] = $key->nik;
					$row[] = $key->jenis_kelamin;
					// $row[] = $key->tempat_lahir . ', ' . $key->tanggal_lahir;
					// $row[] = $key->no_hp;
					// $row[] = $key->nama_ayah;
					// $row[] = $key->nama_ibu;
					// $row[] = $key->sekolah_asal;
					// $row[] = $key->jurusan_sekolah_asal;
					$row[] = $key->dari;
					$row[] = '<div class="btn-group">
					<button type="button" class="btn btn-info">Pilih Aksi</button>
					<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="mdi mdi-chevron-down"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../assets/images/users/' . $key->foto_profil . '">Foto Profil</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->izazah . '">Foto Ijazah</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp . '"">Foto Ktp</a>
						<div class="dropdown-divider">Orang Tua</div>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp_ayah . '"">KTP Ayah</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp_ibu . '"">KTP Ibu</a>
					</div>
					</div>';
					$data[] = $row;
				}
				$data = array('response' => 'success', 'post' => $data);
			} else {
				$data = array('response' => 'success', 'post' => '');
			}
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function datatable_lulus()
	{
		if ($this->request->isAJAX()) {
			$csrfname = csrf_token();
			$csrfhash = csrf_hash();
			$jurusan = $this->request->getGet('jurusan');
			if ($jurusan != null) {
				$post = $this->profilModel
					->select('profil.id, jurusan_id, nim, email, nama_lengkap, jurusan.jurusan, agama, nik, nisn, npsn, tempat_lahir, tanggal_lahir, jenis_kelamin, no_hp, sekolah_asal, jurusan_sekolah_asal, tahun_lulus, nama_ayah, nama_ibu, foto_profil, izazah, ktp, ktp_ayah, ktp_ibu')
					->join('status_mhs', 'status_mhs.profil_id = profil.id')
					->join('jurusan', 'profil.jurusan = jurusan.jurusan_id')
					->join('users', 'profil.id = users.id')
					->where('profil.jurusan', $jurusan)->findAll();
			} else {
				$post = $this->profilModel
					->select('profil.id, jurusan_id, nim, email, nama_lengkap, jurusan.jurusan, agama, nik, nisn, npsn, tempat_lahir, tanggal_lahir, jenis_kelamin, no_hp, sekolah_asal, jurusan_sekolah_asal, tahun_lulus, nama_ayah, nama_ibu, foto_profil, izazah, ktp, ktp_ayah, ktp_ibu')
					->join('jurusan', 'profil.jurusan = jurusan.jurusan_id')
					->join('users', 'profil.id = users.id')
					->join('status_mhs', 'status_mhs.profil_id = profil.id')->findAll();
			}
			if ($post) {
				$no = 0;

				foreach ($post as $key) {
					$no++;
					$row = array();
					$row[] = $key->nim . str_pad($no, 3, '0', STR_PAD_LEFT);;
					$row[] = $key->nama_lengkap;
					$row[] = $key->jurusan;
					$row[] = $key->agama;
					$row[] = $key->nisn;
					$row[] = $key->npsn;
					$row[] = $key->nik;
					$row[] = $key->jenis_kelamin;
					$row[] = $key->tempat_lahir . ', ' . $key->tanggal_lahir;
					$row[] = $key->no_hp;
					$row[] = $key->nama_ayah;
					$row[] = $key->nama_ibu;
					$row[] = $key->sekolah_asal;
					$row[] = $key->jurusan_sekolah_asal;
					$row[] = $key->email;
					$row[] = $key->tahun_lulus;
					$row[] = '<div class="btn-group">
					<button type="button" class="btn btn-info">Pilih Aksi</button>
					<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="mdi mdi-chevron-down"></i>
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../assets/images/users/' . $key->foto_profil . '">Foto Profil</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->izazah . '">Foto Ijazah</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp . '"">Foto Ktp</a>
						<div class="dropdown-divider">Orang Tua</div>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp_ayah . '"">KTP Ayah</a>
						<a class="dropdown-item" href="../assets/images/users/doc/' . $key->ktp_ibu . '"">KTP Ibu</a>
					</div>
					</div>';
					$data[] = $row;
				}
				$data = array('response' => 'success', 'post' => $data);
			} else {
				$data = array('response' => 'success', 'post' => '');
			}
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function setlulus()
	{
		if ($this->request->isAJAX()) {
			$csrfname = csrf_token();
			$csrfhash = csrf_hash();

			$id = $this->request->getPost('profil_id');
			$jurusan = $this->request->getPost('jurusan');

			for ($i = 0; $i < count($id); $i++) {
				if ($id[$i] != null) {
					$nim = substr($this->tahunModel->gettahunaktif(), 2, 2);
					$nim = $nim . $jurusan[$i];
					$row = [
						'nim' => $nim,
						'profil_id' => $id[$i],
					];

					$data[] = $row;
				}
			}

			$this->statusmhsModel->insertBatch($data);

			$data = array('success' => 'Berhasil Menambah Mahasiswa Lulus');
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	public function add()
	{
		if ($this->request->isAJAX()) {
			$csrfname = csrf_token();
			$csrfhash = csrf_hash();

			// $jurusan = $this->request->getPost('jurusan');
			// return $this->response->setJSON($jurusan);
			if (!$this->validate(
				[
					'username' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Username harus dipilih !'
						]
					],
					'jurusan' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Jurusan harus dipilih !'
						]
					],
					'nama_lengkap' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Nama lengkap harus diisi !'
						]
					],
					'nik' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'NIK harus diisi !'
						]
					],
					'nisn' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'NISN harus diisi !'
						]
					],
					'npsn' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'NPSN harus diisi !'
						]
					],
					'jenis_kelamin' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Jenis kelamin harus dipilih !'
						]
					],
					'no_hp' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'No HP harus diisi !'
						]
					],
					'alamat' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Alamat lengkap harus diisi !'
						]
					],
					'desa' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Desa harus dipilih !'
						]
					],
					'kecamatan' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Kecamatan harus dipilih !'
						]
					],
					'kabupaten' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Kabupaten harus dipilih !'
						]
					],
					'provinsi' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Provinsi harus dipilih !'
						]
					],
					'agama' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Agama harus dipilih !'
						]
					],
					'tempat_lahir' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Tempat lahir harus diisi !'
						]
					],
					'tanggal_lahir' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Tanggal lahir harus diisi !'
						]
					],
					'nama_ayah' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Nama ayah harus diisi !'
						]
					],
					'nama_ibu' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Nama ibu harus diisi !'
						]
					],
					'sekolah_asal' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Sekolah asal harus diisi !'
						]
					],
					'jurusan_sekolah_asal' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Jurusan sekolah asal harus diisi !'
						]
					],
					'tahun_lulus' => [
						'rules' => 'required',
						'errors' => [
							'required' => 'Tahun lulus harus diisi !'
						]
					],
					'foto_profil' => [
						'rules' => 'uploaded[foto_profil]|max_size[foto_profil,2048]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto profil !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_ktp' => [
						'rules' => 'uploaded[foto_ktp]|max_size[foto_ktp,2048]|is_image[foto_ktp]|mime_in[foto_ktp,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto KTP !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_kk' => [
						'rules' => 'uploaded[foto_kk]|max_size[foto_kk,2048]|is_image[foto_kk]|mime_in[foto_kk,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto KK !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_akta' => [
						'rules' => 'uploaded[foto_akta]|max_size[foto_akta,2048]|is_image[foto_akta]|mime_in[foto_akta,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto akta !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_ijazah' => [
						'rules' => 'uploaded[foto_akta]|max_size[foto_akta,2048]|is_image[foto_akta]|mime_in[foto_akta,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto ijazah !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_ktp_ayah' => [
						'rules' => 'uploaded[foto_ktp_ayah]|max_size[foto_ktp_ayah,2048]|is_image[foto_ktp_ayah]|mime_in[foto_ktp_ayah,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto KTP ayah !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
					'foto_ktp_ibu' => [
						'rules' => 'uploaded[foto_ktp_ibu]|max_size[foto_ktp_ibu,2048]|is_image[foto_ktp_ibu]|mime_in[foto_ktp_ibu,image/jpg,image/jpeg,image/png]',
						'errors' => [
							'uploaded' => 'Upload foto KTP ibu !',
							'max_size' => 'Ukuran gambar maximal 2Mb !',
							'is_image' => 'Yang anda upload bukan gambar !',
							'mime_in' => 'Pilih format Jpg/Jpeg/Png !'
						]
					],
				]
			)) {
				$validation = service('validation')->getErrors();
				$data = $validation;
				$data[$csrfname] = $csrfhash;
				return $this->response->setJSON($data);
			}
			$alamat = $this->request->getPost('alamat');
			$provinsi = $this->request->getPost('provinsi');
			$kabupaten = $this->request->getPost('kabupaten');
			$kecamatan = $this->request->getPost('kecamatan');
			$desa = $this->request->getPost('desa');

			$file_profil = $this->request->getFile('foto_profil');
			$file_profil->move('assets/images/users/');
			$foto_profil = $file_profil->getName();

			$file_ktp = $this->request->getFile('foto_ktp');
			$file_ktp->move('assets/images/users/doc');
			$foto_ktp = $file_ktp->getName();

			$file_kk = $this->request->getFile('foto_kk');
			$file_kk->move('assets/images/users/doc');
			$foto_kk = $file_kk->getName();

			$file_akta = $this->request->getFile('foto_akta');
			$file_akta->move('assets/images/users/doc');
			$foto_akta = $file_akta->getName();

			$file_ijazah = $this->request->getFile('foto_ijazah');
			$file_ijazah->move('assets/images/users/doc');
			$foto_ijazah = $file_ijazah->getName();

			$file_ktp_ayah = $this->request->getFile('foto_ktp_ayah');
			$file_ktp_ayah->move('assets/images/users/doc');
			$foto_ktp_ayah = $file_ktp_ayah->getName();

			$file_ktp_ibu = $this->request->getFile('foto_ktp_ibu');
			$file_ktp_ibu->move('assets/images/users/doc');
			$foto_ktp_ibu = $file_ktp_ibu->getName();

			$user_id = $this->request->getPost('username');

			$data = [
				'jurusan' => $this->request->getPost('jurusan'),
				'nama_lengkap' => $this->request->getPost('nama_lengkap'),
				'nik' => $this->request->getPost('nik'),
				'nisn' => $this->request->getPost('nisn'),
				'npsn' => $this->request->getPost('npsn'),
				'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
				'no_hp' => $this->request->getPost('no_hp'),
				'alamat' => $alamat . '-' . $desa . '-' . $kecamatan . '-' . $kabupaten . '-' . $provinsi,
				'agama' => $this->request->getPost('agama'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
				'nama_ayah' => $this->request->getPost('nama_ayah'),
				'nama_ibu' => $this->request->getPost('nama_ibu'),
				'sekolah_asal' => $this->request->getPost('sekolah_asal'),
				'jurusan_sekolah_asal' => $this->request->getPost('jurusan_sekolah_asal'),
				'tahun_lulus' => $this->request->getPost('tahun_lulus'),
				'dari' => $this->request->getPost('dari'),
				'foto_profil' => $foto_profil,
				'ktp' => $foto_ktp,
				'kk' => $foto_kk,
				'akta' => $foto_akta,
				'izazah' => $foto_ijazah,
				'ktp_ayah' => $foto_ktp_ayah,
				'ktp_ibu' => $foto_ktp_ibu,
				'user_id' => $user_id,
				'tahun' => $this->tahunModel->gettahunaktif(),
			];

			$this->profilModel->save($data);

			if (!$this->auth->removeUserFromGroup($user_id, 'none')) {
				$data = array('error' => 'Gagal Menghapus Grup User');
			} else if (!$this->auth->addUserToGroup($user_id, 'mahasiswa')) {
				$data = array('error' => 'Gagal Menambah Grup User');
			}

			$data = [
				'user_id' => $user_id,
				'order_id' => 'PMB' . Date('Ymdhms') . $user_id,
				'payment_type' => 'Offline',
				'gross_amount' => 200000,
				'status' => 'settlement',
			];

			$this->pembayaranModel->save($data);

			$data = array('success' => 'Berhasil menginput formulir pendaftaran');
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
}