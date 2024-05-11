<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertemuan2 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function errorMessages(): array
	{
		return  [
			'required' => '{field} harus diisi.',
			'numeric' => '{field} harus diisi dengan angka.',
			'exact_length' => '{field} harus memiliki panjang {param} karakter.',
			'greater_than_equal_to' => '{field} harus lebih dari sama dengan {param}.',
			'less_than_equal_to' => '{field} harus kurang dari sama dengan {param}.',
			'min_length' => 'Panjang {field} minimal {param} karakter.',
		];
	}

	public function index()
	{
		$this->load->view('pertemuan2_view');
	}

	public function tampilkan_data()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', $this->errorMessages());

		$this->form_validation->set_rules('npm', 'NPM', [
			'required',
			'numeric',
			'exact_length[10]'
		], $this->errorMessages());

		$this->form_validation->set_rules('angkatan', 'Angkatan', [
			'required',
			'numeric',
			'exact_length[4]',
			'greater_than_equal_to[1900]',
			'less_than_equal_to[2100]',
		], $this->errorMessages());

		$this->form_validation->set_rules(
			'kelas',
			'Kelas',
			[
				'required',
				'exact_length[1]',
				'regex_match[/[A-Z]/]'
			],
			array_merge($this->errorMessages(), ['regex_match' => 'Format {field} harus huruf kapital.']),
		);

		$this->form_validation->set_rules('alamat', 'Alamat', [
			'required',
			'min_length[20]',
		], $this->errorMessages());

		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah Favorit', 'required', $this->errorMessages());

		// Jalankan validasi
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, tampilkan kembali form input data
			return $this->load->view('pertemuan2_view');
		}

		// Ambil data dari form jika validasi berhasil
		$data['nama'] = $this->input->post('nama');
		$data['npm'] = $this->input->post('npm');
		$data['angkatan'] = $this->input->post('angkatan');
		$data['kelas'] = $this->input->post('kelas');
		$data['alamat'] = $this->input->post('alamat');
		$data['mata_kuliah'] = $this->input->post('mata_kuliah');
		// Tampilkan data di halaman lain
		$this->load->view('pertemuan2_result_view', $data);
	}
}
