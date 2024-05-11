<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		header('Location: https://said.remot.id/mahasiswa/');
		exit;
	}
}
