<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\ProfilModel;
use CodeIgniter\HTTP\ResponseTrait;

class Pendaftar extends BaseController
{

	use ResponseTrait;
	public function __construct()
	{
		$this->profilModel = new ProfilModel();
		$this->pembayaranModel = new PembayaranModel();
	}
	public function index()
	{

		$data = [
			'profil' => $this->userModel->join('profil', 'profil.user_id = users.id')->find(user_id()),
			'title_meta' => view('panel/partials/title-meta', ['title' => 'Form Registration']),
			'page_title' => view('panel/partials/page-title', ['title' => 'Form Registration', 'li_1' => 'PMB STKIP NU INDRAMAYU', 'li_2' => 'Form Pendaftaran'])
		];

		if ($status = $this->pembayaranModel->where('user_id', user_id())->get()->getRow()) {
			if ($status->status == "settlement") {
				return view('panel/form-pendaftaran', $data);
			} else {
				return redirect()->to('/pendaftar');
			}
		} else {
			return redirect()->to('/pendaftar');
		}
	}

	public function data()
	{

		$data = [
			'profil' => $this->userModel->join('profil', 'profil.user_id = users.id')->find(user_id()),
			'title_meta' => view('panel/partials/title-meta', ['title' => 'Data Diri']),
			'page_title' => view('panel/partials/page-title', ['title' => 'Data Diri', 'li_1' => 'PMB STKIP NU INDRAMAYU', 'li_2' => 'Data Diri'])
		];
		return view('panel/data-diri', $data);
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
				'foto_profil' => $foto_profil,
				'ktp' => $foto_ktp,
				'kk' => $foto_kk,
				'akta' => $foto_akta,
				'izazah' => $foto_ijazah,
				'ktp_ayah' => $foto_ktp_ayah,
				'ktp_ibu' => $foto_ktp_ibu,
				'user_id' => user_id(),
				'dari' => $this->request->getPost('dari'),
				'tahun' => $this->tahunModel->gettahunaktif(),
			];

			$this->profilModel->save($data);

			$data = array('success' => 'Berhasil menginput formulir pendaftaran');
			$data[$csrfname] = $csrfhash;
			return $this->response->setJSON($data);
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
}