<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertemuan3 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
	}

	public function index()
	{
		$data['barang'] = $this->BarangModel->getAll();

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['barang'] = $this->BarangModel->search($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;
		$this->load->view('pertemuan3_view', $data);
	}
}
