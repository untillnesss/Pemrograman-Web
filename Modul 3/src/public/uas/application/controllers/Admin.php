<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		//load the validation library
		$this->load->library('form_validation');
		$this->load->library("pagination");

		if ($this->session->userdata('username') == '') {
			redirect(base_url() . 'login');
		}

		if ($this->session->userdata('level_user') == 2) {
			redirect(base_url() . 'tamu_kamar');
		}

		$this->load->model("admin_model");
	}

	function runValidation()
	{
		$this->form_validation->set_rules('tipe', 'Nama kamar', 'required', [
			'required' => '%s harus diisi.',
		]);
		$this->form_validation->set_rules('jumlah', 'Jumlah kamar', 'required|numeric', [
			'required' => '%s harus diisi.',
			'numeric' => '%s hanya boleh berisi angka.'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
			'required' => '%s harus diisi.',
			'numeric' => '%s hanya boleh berisi angka.'
		]);

		return $this->form_validation->run();
	}

	function runValidationFasilitas()
	{
		$this->form_validation->set_rules('name', 'Nama Fasilitas', 'required', [
			'required' => '%s harus diisi.',
		]);

		return $this->form_validation->run();
	}

	public function index()
	{
		$countKamar = $this->admin_model->countKamar();
		$countTamu = $this->admin_model->countTamu();
		$countPesanan = $this->admin_model->countPesanan();
		$sumPesanan = $this->admin_model->sumPesanan();

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/welcome.php', [
			'kamar' => $countKamar,
			'tamu' => $countTamu,
			'pesanan' => $countPesanan,
			'sumPesanan' => $sumPesanan,
		]);
		$this->load->view('.footer.php');
	}

	public function kamar_list()
	{
		$data['kamars'] = $this->admin_model->fetch_kamar_perpage(0, 0);

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['kamars'] = $this->admin_model->search($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;

		$data['fasilitas'] = [];
		foreach ($data['kamars'] as $kamar) {
			$kamarId = $kamar['idkamar'];
			$data['fasilitas'][$kamarId] = $this->admin_model->kamar_fasilitas($kamarId);
		}

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function fasilitas_list()
	{
		$data['kamars'] = $this->admin_model->fetch_fasilitas_perpage(0, 0);

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['kamars'] = $this->admin_model->search_fasilitas($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/fasilitas/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function tambah_fasilitas_form()
	{
		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/fasilitas/tambah_form.php',);
		$this->load->view('.footer.php');
	}

	public function tambah_kamar_form()
	{
		$fasilitas = $this->admin_model->all_fasilitas();

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/tambah_kamar_form.php', [
			'fasilitas' => $fasilitas,
		]);
		$this->load->view('.footer.php');
	}

	public function tambah_fasilitas_save()
	{
		if ($this->runValidationFasilitas() == false) {
			$this->load->view('.header.php');
			$this->load->view('admin/.nav-admin.php');
			$this->load->view('admin/fasilitas/tambah_form.php',);
			$this->load->view('.footer.php');
			return;
		}

		$data = array(
			'name' => $this->input->post('name'),
		);
		$this->admin_model->insert_fasilitas($data);
		$this->session->set_flashdata('success', 'Berhasil menambah fasilitas.');
		redirect(base_url() . 'admin/fasilitas_list');
	}

	public function tambah_kamar_save()
	{
		if ($this->runValidation() == false) {
			$fasilitas = $this->admin_model->all_fasilitas();

			$this->load->view('.header.php');
			$this->load->view('admin/.nav-admin.php');
			$this->load->view('admin/kamar/tambah_kamar_form.php', [
				'fasilitas' => $fasilitas,
			]);
			$this->load->view('.footer.php');
			return;
		}
		//mencari auto increment kamar id
		$kamar = $this->admin_model->kamarid_ai()->row();

		$config['file_name'] = $kamar->kamarid_ai;
		$config['upload_path'] = './uploads/admin/kamar';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
		$this->upload->overwrite = true;

		if (!$this->upload->do_upload('gambar')) {
			$fasilitas = $this->admin_model->all_fasilitas();
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('.header.php');
			$this->load->view('admin/.nav-admin.php');
			$this->load->view('admin/kamar/tambah_kamar_form.php', [
				'fasilitas' => $fasilitas,
				'error' => $error,
			]);
			$this->load->view('.footer.php');
		} else {
			$data = array(
				'tipe' => $this->input->post('tipe'),
				'jumlah' => $this->input->post('jumlah'),
				'harga' => $this->input->post('harga'),
				'gambar' => $this->upload->data('file_name'),
			);
			$fasilitas = $this->input->post('fasilitas[]');

			$this->admin_model->insert_kamar($data, $fasilitas);
			$this->session->set_flashdata('success', 'Berhasil menambah kamar.');
			redirect(base_url() . 'admin/kamar_list');
		}
	}

	public function ubah_kamar_form()
	{
		$id = $this->uri->segment(3);
		$data['kamar'] = $this->admin_model->fetch_kamar_single($id)->row();
		$data['kamar_fasilitas'] = array_map(function ($data) {
			return $data['fasilitas_id'];
		}, $this->admin_model->kamar_fasilitas($id));

		$fasilitas = $this->admin_model->all_fasilitas();
		$data['fasilitas'] = $fasilitas;

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/ubah_kamar_form.php', $data);
		$this->load->view('.footer.php');
	}

	public function ubah_fasilitas_form()
	{
		$id = $this->uri->segment(3);
		$data['kamar'] = $this->admin_model->fetch_fasilitas_single($id)->row();

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/fasilitas/ubah_form.php', $data);
		$this->load->view('.footer.php');
	}

	public function ubah_fasilitas_save()
	{
		$id = $this->input->post('id');
		$data['kamar'] = $this->admin_model->fetch_fasilitas_single($id)->row();

		if ($this->runValidationFasilitas() == false) {

			$this->load->view('.header.php');
			$this->load->view('admin/.nav-admin.php');
			$this->load->view('admin/fasilitas/ubah_form.php', $data);
			$this->load->view('.footer.php');
			return;
		}

		$data = array(
			'id' => $id,
			'name' => $this->input->post('name'),
		);
		$this->admin_model->update_fasilitas($data);

		$this->session->set_flashdata('success', 'Berhasil mengubah fasilitas.');
		redirect(base_url() . 'admin/fasilitas_list');
	}

	public function ubah_kamar_save()
	{
		$idKamar = $this->input->post('idkamar');
		$data['kamar'] = $this->admin_model->fetch_kamar_single($idKamar)->row();

		if ($this->runValidation() == false) {

			$this->load->view('.header.php');
			$this->load->view('admin/.nav-admin.php');
			$this->load->view('admin/kamar/ubah_kamar_form.php', $data);
			$this->load->view('.footer.php');
			return;
		}

		if ((!isset($_FILES['gambar'])) || $_FILES['gambar']['size'] == 0) {
			$data = array(
				'idkamar' => $idKamar,
				'tipe' => $this->input->post('tipe'),
				'jumlah' => $this->input->post('jumlah'),
				'harga' => $this->input->post('harga'),
			);
			$fasilitas = $this->input->post('fasilitas[]');
			$this->admin_model->update_kamar($data, $fasilitas);

			$this->session->set_flashdata('success', 'Berhasil mengubah kamar.');
			redirect(base_url() . 'admin/kamar_list');
			return;
		} else {
			$config['file_name'] = $idKamar;
			$config['upload_path'] = './uploads/admin/kamar';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 10000;

			$this->load->library('upload', $config);
			$this->upload->overwrite = true;

			if (!$this->upload->do_upload('gambar')) {
				$error = array('error' => $this->upload->display_errors());
				$data['error'] = $error;

				$this->load->view('.header.php');
				$this->load->view('admin/.nav-admin.php');
				$this->load->view('admin/kamar/ubah_kamar_form.php', $data);
				$this->load->view('.footer.php');
				return;
			} else {
				$data = array(
					'idkamar' => $idKamar,
					'tipe' => $this->input->post('tipe'),
					'jumlah' => $this->input->post('jumlah'),
					'harga' => $this->input->post('harga'),
					'gambar' => $this->upload->data('file_name'),
				);
				$fasilitas = $this->input->post('fasilitas[]');
				$this->admin_model->update_kamar($data, $fasilitas);

				$this->session->set_flashdata('success', 'Berhasil mengubah kamar.');
				redirect(base_url() . 'admin/kamar_list');
				return;
			}
		}
	}

	public function hapus_kamar()
	{
		$id = $this->uri->segment(3);

		$this->admin_model->delete_kamar($id);

		$this->session->set_flashdata('success', 'Berhasil menghapus kamar.');
		redirect(base_url() . 'admin/kamar_list');
	}

	public function hapus_fasilitas()
	{
		$id = $this->uri->segment(3);

		$this->admin_model->delete_fasilitas($id);

		$this->session->set_flashdata('success', 'Berhasil menghapus fasilitas.');
		redirect(base_url() . 'admin/fasilitas_list');
	}

	//tamu
	public function tamu_list()
	{
		$data['tamus'] = $this->admin_model->fetch_tamu_perpage(0, 0);

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['tamus'] = $this->admin_model->search_tamu($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/tamu/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function pemesanan_list()
	{
		$data['pemesanans'] = $this->admin_model->fetch_pemesanan_perpage(0, 0);

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['pemesanans'] = $this->admin_model->fetch_pemesanan_perpage_search($keyword); // Cari mahasiswa berdasarkan nama
		}

		$data['keyword'] = $keyword;

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/pemesanan/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function pemesanan_detail()
	{
		$id = $this->uri->segment(3);
		$data['pemesanan'] = $this->admin_model->fetch_pemesanan_by_id($id);

		// dd($data);

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/pemesanan/detail.php', $data);
		$this->load->view('.footer.php');
	}


	public function konfirmasi_pembayaran()
	{
		$id = $this->uri->segment(3);
		$data = array(
			'idpesan' => $id,
			'status' => "Berhasil",
		);

		$this->admin_model->update_pemesanan_status($data);
		$this->session->set_flashdata('success', 'Berhasil menerima pembayaran.');

		redirect(base_url() . 'admin/pemesanan_list');
	}
}
