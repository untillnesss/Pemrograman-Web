<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertemuan4 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
	}

	public function index(){
		return redirect('pertemuan4/beranda');
	}

	public function beranda()
	{
		$templateData['content'] = $this->load->view('pertemuan-4/home_view', [], true);
		return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
	}

	public function barang()
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

	public function tentang()
	{
		$templateData['content'] = $this->load->view('pertemuan-4/about_view', [], true);
		return $this->load->view('pertemuan-4/layouts/main_layout', $templateData);
	}
}
