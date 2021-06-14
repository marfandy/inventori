<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('model_login');
		

		$this->user_id = $this->session->userdata('usr_id');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function getlogin()
	{
		$user=$this->input->post('username');
		$pass=$this->input->post('password');
		$this->load->model('model_login');
		$this->model_login->getlogin($user,$pass);

	}
}
