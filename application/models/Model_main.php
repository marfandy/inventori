<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_Model {

	function count_all()
	{
		$this->db->select('count(nama_peralatan) AS total');
		$this->db->from('data_peralatan');
		$query = $this->db->get();
		return $query->row();
	}

	function get_report()
	{
		date_default_timezone_set("Asia/Makassar");
		$now = date("Y-m-d");
		$this->db->select('*');
		$this->db->from('laporan_peralatan');
		$this->db->where('tgl',$now);
		$query = $this->db->get();
		return $query->result();
	}

	function get_rusak()
	{
		date_default_timezone_set("Asia/Makassar");
		$now = date("Y-m");
		$this->db->select('*');
		$this->db->from('laporan_peralatan');
		$this->db->where('kondisi','Rusak');
		$this->db->where("COALESCE(to_char(tgl, 'YYYY-MM'),'') = '$now'");
		$query = $this->db->get();
		return $query->result();
	}

	function count_rusak()
	{
		$this->db->select('count(nama_peralatan) AS total');
		$this->db->where('kondisi','Rusak');
		$this->db->from('data_peralatan');
		$query = $this->db->get();
		return $query->row();
	}


	function get_all_rusak()
	{
		$this->db->select('*');
		$this->db->from('data_peralatan');
		$this->db->where('kondisi','Rusak');
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

	function delete_laporan($id_laporan)
	{
		$this->db->where('id_laporan',$id_laporan);
		$this->db->delete('laporan_peralatan');
	}

}
