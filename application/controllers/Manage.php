<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->helper(array('form','file','url'));
		$this->load->model('model_manage');


	}

	function index()
	{
		$this->model_security->getsecurity();

		$this->list_alat();
	}

	function list_alat()
	{
		$this->model_security->getsecurity();

		$isi['content'] 		= 'pages/peralatan_view';
		$isi['judul'] 			= 'Manage';
		$isi['sub_judul']		= 'Daftar Peralatan';
		$isi['get_peralatan'] 	= $this->model_manage->get_all_peralatan();
		$isi['get_main'] 		= $this->model_manage->get_main_kategori();
		$isi['get_sub'] 		= $this->model_manage->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function create()
	{
		$this->model_security->getsecurity();

		$isi['content'] 	= 'pages/create_view';
		$isi['judul'] 		= 'Manage';
		$isi['sub_judul']	= 'Input Peralatan';
		$isi['get_main']	= $this->model_manage->get_main_kategori();

		$this->load->view('static/home_view',$isi);
	}

	function get_sub_kategori()
	{
		$this->model_security->getsecurity();

		$category_id = $this->input->post('id');
		$data = $this->model_manage->get_sub_kategori($category_id)->result();
		echo json_encode($data);
	}

	function add_peralatan()
	{
		$this->model_security->getsecurity();

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
			'nomor_sertifikasi'	=> (!empty($this->input->post('nomor_sertifikasi'))) ? $this->input->post('nomor_sertifikasi') : NULL,
			'tahun_sertifikasi'	=> (!empty($this->input->post('tahun_sertifikasi'))) ? $this->input->post('tahun_sertifikasi') : NULL,
			'status'			=> (!empty($this->input->post('status'))) ? $this->input->post('status') : NULL,
			'keterangan'		=> (!empty($this->input->post('keterangan'))) ? $this->input->post('keterangan') : NULL
		);

		$this->model_manage->get_insert($insert);
		$this->session->set_flashdata('info', 'Data berhasil ditambahkan');
		redirect('manage/create');

	}

	function update_peralatan()
	{
		$this->model_security->getsecurity();

		$update = array(
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
			'nomor_sertifikasi'	=> (!empty($this->input->post('nomor_sertifikasi'))) ? $this->input->post('nomor_sertifikasi') : NULL,
			'tahun_sertifikasi'	=> (!empty($this->input->post('tahun_sertifikasi'))) ? $this->input->post('tahun_sertifikasi') : NULL,
			'status'			=> (!empty($this->input->post('status'))) ? $this->input->post('status') : NULL,
			'keterangan'		=> (!empty($this->input->post('keterangan'))) ? $this->input->post('keterangan') : NULL
		);

		$id_peralatan = $this->input->post('id_peralatan');

		$this->model_manage->get_update($update,$id_peralatan);
		$this->session->set_flashdata('info', 'Data berhasil diubah');
		redirect('manage');

	}


	function delete_peralatan()
	{
		$this->model_security->getsecurity();

		$id_peralatan = $this->input->post('id_peralatan');

		$this->model_manage->get_delete($id_peralatan);
		$this->session->set_flashdata('info', 'Data berhasil dihapus');
		redirect('manage');

	}

	function kategori()
	{
		$this->model_security->getsecurity();

		$isi['content'] 	= 'pages/kategori_view';
		$isi['judul'] 		= 'Manage';
		$isi['sub_judul']	= 'Daftar Kategori';

		$isi['get_main']	= $this->model_manage->get_main_kategori();
		$this->load->view('static/home_view',$isi);
	}

	function insert_kategori()
	{
		$this->model_security->getsecurity();

		$insert['nama_kategori_peralatan'] = strtoupper($this->input->post('nama_kategori_peralatan'));
		$this->model_manage->insert_kategori($insert);
		$this->session->set_flashdata('info', 'Kategori berhasil ditambahkan');
		redirect('manage/kategori');
	}

	function update_kategori()
	{
		$this->model_security->getsecurity();

		$update['nama_kategori_peralatan'] = strtoupper($this->input->post('nama_kategori_peralatan'));
		$id_kategori = $this->input->post('id_kategori');
		$this->model_manage->update_kategori($update,$id_kategori);
		$this->session->set_flashdata('info', 'Kategori berhasil diubah');
		redirect('manage/kategori');
	}

	function delete_kategori()
	{
		$this->model_security->getsecurity();

		$id_kategori = $this->input->post('id_kategori');
		$this->model_manage->delete_kategori($id_kategori);
		$this->session->set_flashdata('info', 'Kategori berhasil dihapus');
		redirect('manage/kategori');
	}

	function sub_kategori()
	{
		$this->model_security->getsecurity();

		$isi['content'] 	= 'pages/sub_view';
		$isi['judul'] 		= 'Manage';
		$isi['sub_judul']	= 'Daftar Sub Kategori';
		$isi['get_main']	= $this->model_manage->get_main_kategori();
		$isi['get_sub']		= $this->model_manage->get_sub();

		$this->load->view('static/home_view',$isi);
	}

	function insert_sub()
	{
		$this->model_security->getsecurity();

		$insert['nama_sub_kategori'] = strtoupper($this->input->post('nama_sub_kategori'));
		$insert['main_kategori'] = $this->input->post('main_kategori');
		$this->model_manage->insert_sub($insert);
		$this->session->set_flashdata('info', 'Sub Kategori berhasil ditambahkan');
		redirect('manage/sub_kategori');
	}

	function update_sub()
	{
		$this->model_security->getsecurity();

		$update['nama_sub_kategori'] = strtoupper($this->input->post('nama_sub_kategori'));
		$update['main_kategori'] = $this->input->post('main_kategori');
		$id_sub = $this->input->post('id_sub');
		$this->model_manage->update_sub($update,$id_sub);
		$this->session->set_flashdata('info', 'Sub Kategori berhasil diubah');
		redirect('manage/sub_kategori');
	}

	function delete_sub()
	{
		$this->model_security->getsecurity();
		
		$id_sub = $this->input->post('id_sub');
		$this->model_manage->delete_sub($id_sub);
		$this->session->set_flashdata('info', 'Sub Kategori berhasil dihapus');
		redirect('manage/sub_kategori');
	}
}
