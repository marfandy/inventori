<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	function get_all_peralatan()
	{
		$this->db->select('*');
		$this->db->from('data_peralatan');
		$this->db->order_by('main_kategori,sub_kategori,id_peralatan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function get_sub()
	{
		$this->db->select('*');
		$this->db->from('sub_kategori_peralatan');
		$this->db->order_by('main_kategori,id_sub_kategori_peralatan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function get_main_kategori()
	{
		$this->db->select('*');
		$this->db->from('main_kategori_peralatan');
		$this->db->order_by('id_main_kategori_peralatan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function get_insert($insert)
	{
		$this->db->insert('laporan_peralatan',$insert);
	}

	function get_update($id_peralatan,$update)
	{
		$this->db->where('id_peralatan',$id_peralatan);
		$this->db->update('data_peralatan',$update);
	}


	function get_data_laporan()
	{
		date_default_timezone_set("Asia/Makassar");
		$now = date("Y-m");
		$this->db->select('*');
		$this->db->from('laporan_peralatan');
		$this->db->where("COALESCE(to_char(tgl, 'YYYY-MM'),'') = '$now'");
		$query = $this->db->get();
		return $query->result();
	}
}
