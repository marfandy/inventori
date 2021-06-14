<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper(array('form','file','url'));
		$this->load->model('model_laporan');
		$this->load->library('session');


	}

	function index()
	{
		$this->model_security->getsecurity();
		$isi['content'] 		= 'pages/laporan_view';
		$isi['judul'] 			= 'Laporan';
		$isi['sub_judul']		= 'Buat Laporan';
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function recap()
	{
		$this->model_security->getsecurity();
		$isi['content'] 		= 'pages/recap_view';
		$isi['judul'] 			= 'Manage';
		$isi['sub_judul']		= 'Daftar Peralatan';
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function insert_data()
	{
		$this->model_security->getsecurity();
		if(isset($_POST['tgl']))
		{
			$this->load->library('image_lib');
			$config = array();
			$config['upload_path']="./upload";
			$config['allowed_types']='gif|jpg|jpeg|png';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('gambar'))
			{
				$data = $this->upload->data(); 
				$insert = array(
					'nama_peralatan' 	=> $this->input->post('nama_peralatan'),
					'model'				=> (!empty($this->input->post('model'))) ? $this->input->post('model') : NULL,
					'main_kategori'		=> $this->input->post('main_kategori'),
					'sub_kategori'		=> $this->input->post('sub_kategori'),
					'type_alat'			=> (!empty($this->input->post('type_alat'))) ? $this->input->post('type_alat') : NULL,
					'pabrik'			=> (!empty($this->input->post('pabrik'))) ? $this->input->post('pabrik') : NULL,
					'daya'				=> (!empty($this->input->post('daya'))) ? $this->input->post('daya') : NULL,
					'frekuensi'			=> (!empty($this->input->post('frekuensi'))) ? $this->input->post('frekuensi') : NULL,
					'tahun_perolehan'	=> (!empty($this->input->post('tahun_perolehan'))) ? $this->input->post('tahun_perolehan') : NULL,
					'penempatan'		=> (!empty($this->input->post('penempatan'))) ? $this->input->post('penempatan') : NULL,
					'jumlah'			=> (!empty($this->input->post('jumlah'))) ? $this->input->post('jumlah') : NULL,
					'kondisi'			=> (!empty($this->input->post('kondisi'))) ? $this->input->post('kondisi') : NULL,
					'kondisi_persen'	=> (!empty($this->input->post('kondisi_persen'))) ? $this->input->post('kondisi_persen') : NULL,
					'nomor_sertifikasi'	=> (!empty($this->input->post('nomor_sertifikasi'))) ? $this->input->post('nomor_sertifikasi') : NULL,
					'tahun_sertifikasi'	=> (!empty($this->input->post('tahun_sertifikasi'))) ? $this->input->post('tahun_sertifikasi') : NULL,
					'status'			=> (!empty($this->input->post('status'))) ? $this->input->post('status') : NULL,
					'keterangan'		=> (!empty($this->input->post('keterangan'))) ? $this->input->post('keterangan') : NULL,
					'gambar'			=> (!empty($data["file_name"])) ? $data["file_name"] : NULL,
					'tgl'				=> $this->input->post('tgl')
				);
				$this->model_laporan->get_insert($insert);

				$id_peralatan = $this->input->post('id_peralatan');
				$update['kondisi'] = $this->input->post('kondisi');
				$this->model_laporan->get_update($id_peralatan,$update);
			}
			else
			{

				$data = $this->upload->data(); 
				$insert = array(
					'nama_peralatan' 	=> $this->input->post('nama_peralatan'),
					'model'				=> (!empty($this->input->post('model'))) ? $this->input->post('model') : NULL,
					'main_kategori'		=> $this->input->post('main_kategori'),
					'sub_kategori'		=> $this->input->post('sub_kategori'),
					'type_alat'			=> (!empty($this->input->post('type_alat'))) ? $this->input->post('type_alat') : NULL,
					'pabrik'			=> (!empty($this->input->post('pabrik'))) ? $this->input->post('pabrik') : NULL,
					'daya'				=> (!empty($this->input->post('daya'))) ? $this->input->post('daya') : NULL,
					'frekuensi'			=> (!empty($this->input->post('frekuensi'))) ? $this->input->post('frekuensi') : NULL,
					'tahun_perolehan'	=> (!empty($this->input->post('tahun_perolehan'))) ? $this->input->post('tahun_perolehan') : NULL,
					'penempatan'		=> (!empty($this->input->post('penempatan'))) ? $this->input->post('penempatan') : NULL,
					'jumlah'			=> (!empty($this->input->post('jumlah'))) ? $this->input->post('jumlah') : NULL,
					'kondisi'			=> (!empty($this->input->post('kondisi'))) ? $this->input->post('kondisi') : NULL,
					'kondisi_persen'	=> (!empty($this->input->post('kondisi_persen'))) ? $this->input->post('kondisi_persen') : NULL,
					'nomor_sertifikasi'	=> (!empty($this->input->post('nomor_sertifikasi'))) ? $this->input->post('nomor_sertifikasi') : NULL,
					'tahun_sertifikasi'	=> (!empty($this->input->post('tahun_sertifikasi'))) ? $this->input->post('tahun_sertifikasi') : NULL,
					'status'			=> (!empty($this->input->post('status'))) ? $this->input->post('status') : NULL,
					'keterangan'		=> (!empty($this->input->post('keterangan'))) ? $this->input->post('keterangan') : NULL,
					'gambar'			=> $data["file_name"],
					'tgl'				=> $this->input->post('tgl')
				);
				$this->model_laporan->get_insert($insert);


				$id_peralatan = $this->input->post('id_peralatan');
				$update['kondisi'] = $this->input->post('kondisi');
				$this->model_laporan->get_update($id_peralatan,$update);


			}
		}
		else
		{
			redirect('laporan');
		}

	}

	function laporan_peralatan()
	{
		$this->model_security->getsecurity();
		$isi['content'] 		= 'pages/laporan_peralatan_view';
		$isi['judul'] 			= 'Laporan';
		$isi['sub_judul']		= 'Laporan Peralatan';
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function preview_alat()
	{
		$this->model_security->getsecurity();

		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();
		
		$this->load->view('pages/preview_peralatan_view',$isi);
	}

	function excel_alat()
	{
		$this->model_security->getsecurity();

		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();
		
		$isi['title'] = "DATA PERALATAN ".strtoupper(date('F Y'));
		$this->load->view('pages/export/export_peralatan_view',$isi);
	}

	function laporan_kondisi()
	{
		$this->model_security->getsecurity();
		$isi['content'] 		= 'pages/laporan_kondisi_view';
		$isi['judul'] 			= 'Laporan';
		$isi['sub_judul']		= 'Laporan Kondisi Peralatan';
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function preview_kondisi()
	{
		$this->model_security->getsecurity();

		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();
		
		$this->load->view('pages/preview_kondisi_view',$isi);
	}

	function excel_kondisi()
	{
		$this->model_security->getsecurity();


		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();
		
		$isi['title'] = "DATA KONDISI PERALATAN ".strtoupper(date('F Y'));
		$this->load->view('pages/export/export_kondisi_view',$isi);
	}

	function laporan_bulanan()
	{
		$this->model_security->getsecurity();

		$isi['content'] 		= 'pages/laporan_bulanan_view';
		$isi['judul'] 			= 'Laporan';
		$isi['sub_judul']		= 'Laporan Bulanan';
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function preview_bulanan()
	{
		$this->model_security->getsecurity();
		
		$isi['get_peralatan'] 	= $this->model_laporan->get_all_peralatan();
		$isi['get_main'] 		= $this->model_laporan->get_main_kategori();
		$isi['get_sub'] 		= $this->model_laporan->get_sub();
		if (isset($_POST['priview'])){
			$this->load->view('pages/preview_bulanan_view',$isi);
		} elseif (isset($_POST['export'])){
			$isi['title'] = "DATA EFISIENSI ".strtoupper(date('F Y'));
			$this->load->view('pages/export/export_bulanan_view',$isi);
		}


	}
}
