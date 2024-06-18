<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertemuan5 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
	}

	function runValidation()
	{
		$this->form_validation->set_rules('Kode_Barang', 'Kode Barang', 'required|max_length[20]', [
			'required' => '%s wajib diisi.',
			'max_length' => 'Panjang %s hanya boleh diisi %s karakter.',
		]);
		$this->form_validation->set_rules('Nama_Barang', 'Nama Barang', 'required', [
			'required' => '%s harus diisi.'
		]);
		$this->form_validation->set_rules('Kategori_Barang', 'Kategori Barang', 'required', [
			'required' => '%s harus diisi.'
		]);
		$this->form_validation->set_rules('Deskripsi_Barang', 'Deskripsi Barang', 'required', [
			'required' => '%s harus diisi.',
		]);
		$this->form_validation->set_rules('Harga_Jual', 'Harga Jual', 'required|numeric', [
			'required' => '%s harus diisi.',
			'numeric' => '%s hanya boleh berisi angka.'
		]);
		$this->form_validation->set_rules('Harga_Beli', 'Harga Beli', 'required|numeric', [
			'required' => '%s harus diisi.',
			'numeric' => '%s hanya boleh berisi angka.'
		]);
		$this->form_validation->set_rules('Stok_Barang', 'Stok Barang', 'required|numeric', [
			'required' => '%s harus diisi.',
			'numeric' => '%s hanya boleh berisi angka.'
		]);
		$this->form_validation->set_rules('Supplier_Barang', 'Supplier Barang', 'required', [
			'required' => '%s harus diisi.'
		]);
		$this->form_validation->set_rules('Tanggal_Masuk', 'Tanggal Masuk', 'required', [
			'required' => '%s harus diisi.'
		]);

		return $this->form_validation->run();
	}

	public function index()
	{
		$data['barang'] = $this->BarangModel->getAll();

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['barang'] = $this->BarangModel->search($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;

		$templateData['content'] = $this->load->view('pertemuan-4/barang_view', $data, true);
		return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
	}

	public function create()
	{
		$templateData['content'] = $this->load->view('pertemuan-4/barang_create_view', [], true);
		return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
	}

	public function store()
	{
		if ($this->runValidation() == false) {
			$templateData['content'] = $this->load->view('pertemuan-4/barang_create_view', [], true);
			return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
		} else {
			// Prepare data for insertion
			$data_insert = [
				'kode_barang' => $this->input->post('Kode_Barang'),
				'nama_barang' => $this->input->post('Nama_Barang'),
				'kategori_barang' => $this->input->post('Kategori_Barang'),
				'deskripsi_barang' => $this->input->post('Deskripsi_Barang'),
				'harga_jual' => $this->input->post('Harga_Jual'),
				'harga_beli' => $this->input->post('Harga_Beli'),
				'stok_barang' => $this->input->post('Stok_Barang'),
				'supplier_barang' => $this->input->post('Supplier_Barang'),
				'tanggal_masuk' => $this->input->post('Tanggal_Masuk')
			];

			// Insert data into database
			$insert = $this->BarangModel->insert($data_insert);
			if ($insert) {
				$this->session->set_flashdata('success', 'Data barang berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error', 'Data barang gagal ditambahkan.');
			}
			redirect('pertemuan4/barang');
		}
	}

	public function edit($id)
	{
		$barang = $this->BarangModel->getById($id);

		$templateData['content'] = $this->load->view('pertemuan-4/barang_edit_view', [
			'barang' => $barang,
		], true);
		return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
	}

	public function update($id)
	{
		if ($this->runValidation() == false) {
			$barang = $this->BarangModel->getById($id);

			$templateData['content'] = $this->load->view('pertemuan-4/barang_edit_view', [
				'barang' => $barang,
			], true);
			return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
		} else {
			// Prepare data for insertion
			$data_insert = [
				'kode_barang' => $this->input->post('Kode_Barang'),
				'nama_barang' => $this->input->post('Nama_Barang'),
				'kategori_barang' => $this->input->post('Kategori_Barang'),
				'deskripsi_barang' => $this->input->post('Deskripsi_Barang'),
				'harga_jual' => $this->input->post('Harga_Jual'),
				'harga_beli' => $this->input->post('Harga_Beli'),
				'stok_barang' => $this->input->post('Stok_Barang'),
				'supplier_barang' => $this->input->post('Supplier_Barang'),
				'tanggal_masuk' => $this->input->post('Tanggal_Masuk')
			];

			// Insert data into database
			$insert = $this->BarangModel->update($id, $data_insert);
			if ($insert) {
				$this->session->set_flashdata('success', 'Data barang berhasil diubah.');
			} else {
				$this->session->set_flashdata('error', 'Data barang gagal diubah.');
			}
			redirect('pertemuan4/barang');
		}
	}

	public function delete($id)
	{
		$delete = $this->BarangModel->delete($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Data barang berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data barang gagal dihapus.');
		}

		redirect('pertemuan4/barang');
	}
}
