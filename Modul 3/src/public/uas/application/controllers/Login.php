<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	private $googleClient;

	public function __construct()
	{
		parent::__construct();

		$this->googleClient = new Google_Client();

		$this->googleClient->setClientId('185716832220-moeii9ci220abu93oh6ed7ai9b6qr36c.apps.googleusercontent.com'); //Define your ClientID
		$this->googleClient->setClientSecret('vfoyqku6oAnoiMZVDwGNqlKJ'); //Define your Client Secret Key
		$this->googleClient->setRedirectUri(base_url('login/google')); //Define your Redirect Uri
		$this->googleClient->addScope('email');
		$this->googleClient->addScope('profile');

		//load the validation library
		// $this->load->library('form_validation');
		// $this->load->library("pagination");
		// if($this->session->userdata('username') == ''){
		//     redirect(base_url() . 'login');
		// }
		$this->load->model("login_model");
	}

	public function index()
	{		
		if ($this->session->userdata('username') != '') {
			redirect(base_url() . 'admin');
		}
		
		$this->load->view('.header.php');
		$this->load->view('login/index', [
			'loginGoogleUrl' => $this->googleClient->createAuthUrl(),
		]);

		$this->load->view('.footer.php');
	}

	public function login_validation()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $this->load->model('login_model');

		$data = array(
			'username' => $username,
			'password' => md5($password),
		);


		$user = $this->login_model->fetch_user($data)->row();
		if (!empty($user)) {
			if ($user->level_user == 1) {
				$session_data = array(
					'id' => $user->idtamu,
					'username' => $username,
					'level_user' => $user->level_user
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'login/enter');
			} else if ($user->level_user == 2) {
				$session_data = array(
					'id' => $user->idtamu,
					'username' => $username,
					'level_user' => $user->level_user
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'login/enter');
			} else {
				redirect(base_url() . 'login');
			}
		} else {
			$this->session->set_flashdata('error', 'Username atau Password salah, silahkan coba lagi.');
			redirect(base_url() . 'login');
		}
	}

	function enter()
	{
		if ($this->session->userdata('username') != '' && $this->session->userdata('level_user') == '1') {
			//echo '<h2>Welcome - ' . $this->session->userdata('username'). '</h2>';
			//echo '<label><a href="' . base_url() . 'login/logout">Logout</a></label>';
			redirect(base_url());
		} else if ($this->session->userdata("username") != '' && $this->session->userdata('level_user') == '2') {
			redirect(base_url() . 'tamu_kamar');
		} else {
			redirect(base_url() . 'login');
		}
	}

	function registrasi_form()
	{
		$this->load->view('.header.php');
		$this->load->view('login/registrasi');
		$this->load->view('.footer.php');
	}

	function registrasi_save()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('notelp'),
		);

		print_r($data);
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url() . 'login');
	}

	function login_google()
	{
		if (!isset($_GET["code"])) redirect('login');

		$token = $this->googleClient->fetchAccessTokenWithAuthCode($_GET["code"]);
		if (isset($token["error"])) redirect('login');

		$this->googleClient->setAccessToken($token['access_token']);
		$this->session->set_userdata('access_token', $token['access_token']);

		$google_service = new Google_Service_Oauth2($this->googleClient);
		$data = $google_service->userinfo->get();

		$user = $this->login_model->hasUser($data['email']);
		if (!empty($user)) {
			// EMAIL REGISTERED
			if ($user->level_user == 1) {
				$session_data = array(
					'id' => $user->idtamu,
					'username' => $user->username,
					'level_user' => $user->level_user
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'login/enter');
			} else if ($user->level_user == 2) {
				$session_data = array(
					'id' => $user->idtamu,
					'username' => $user->username,
					'level_user' => $user->level_user
				);
				$this->session->set_userdata($session_data);
				redirect(base_url() . 'login/enter');
			} else {
				redirect(base_url() . 'login');
			}
		} else {
			// EMAIL NOTFOUND
			$id = $this->login_model->insert_tamu([
				'username' => $data['email'],
				'password' => $token['access_token'],
				'email' => $data['email'],
				'nama' => $data['name'],
				'alamat' => '',
				'telepon' => '',
				'foto' => '',
				'level_user' => 2,
			]);

			$session_data = array(
				'id' => $id,
				'username' => $data['email'],
				'level_user' => 2
			);
			$this->session->set_userdata($session_data);
			redirect(base_url() . 'login/enter');
		}
	}
}
