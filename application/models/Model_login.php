<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($user,$pass)
	{
		// $pass_ = md5($pass);
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		$query = $this->db->get('mst_user');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$sess = array('username' 	=> $row->username,
								'hak_aksess' 	=> $row->hak_aksess,
								'nama'	=> $row->nama);
				$this->session->set_userdata($sess);
				redirect('main');
			}
		}
		else
		{
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('login');
		}
	}
}
