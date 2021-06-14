<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->helper(array('form','file','url'));
		$this->load->model('model_main');
		$this->load->model('model_security');
	}

	function index()
	{
		$this->model_security->getsecurity();

		$isi['content'] 	= 'pages/main_view';
		$isi['judul'] 		= 'Main';
		$isi['sub_judul']	= 'Dashboard';
		$isi['count_all']	= $this->model_main->count_all();
		$isi['count_rusak']	= $this->model_main->count_rusak();
		$isi['get_report']	= $this->model_main->get_report();
		$isi['get_rusak']	= $this->model_main->get_rusak();

		$this->load->view('static/home_view',$isi);
	}

	function total_rusak()
	{
		$this->model_security->getsecurity();

		$isi['content'] 		= 'pages/rusak_view';
		$isi['judul'] 			= 'Main';
		$isi['sub_judul']		= 'Tabel Kerusakan Alat';
		$isi['get_peralatan'] 	= $this->model_main->get_all_rusak();
		$isi['get_main'] 		= $this->model_main->get_main_kategori();
		$isi['get_sub'] 		= $this->model_main->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function laporan_rusak()
	{
		$this->model_security->getsecurity();

		$isi['content'] 		= 'pages/laporan_rusak_view';
		$isi['judul'] 			= 'Main';
		$isi['sub_judul']		= 'Tabel Laporan Kerusakan';
		$isi['get_peralatan'] 	= $this->model_main->get_rusak();
		$isi['get_main'] 		= $this->model_main->get_main_kategori();
		$isi['get_sub'] 		= $this->model_main->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function presentase_alat()
	{
		$this->model_security->getsecurity();

		$isi['content'] 		= 'pages/peralatan_view';
		$isi['judul'] 			= 'Manage';
		$isi['sub_judul']		= 'Daftar Peralatan';
		$isi['get_peralatan'] 	= $this->model_main->get_all_rusak();
		$isi['get_main'] 		= $this->model_main->get_main_kategori();
		$isi['get_sub'] 		= $this->model_main->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function delete_report()
	{
		$this->model_security->getsecurity();
		
		if(isset($_POST['id_laporan']))
		{
			$id_laporan = $this->input->post('id_laporan');
			$this->model_main->delete_laporan($id_laporan);
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
