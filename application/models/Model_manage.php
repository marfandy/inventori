<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manage extends CI_Model {

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

	function get_sub_kategori($category_id)
	{
		$query = $this->db->get_where('sub_kategori_peralatan', array('main_kategori' => $category_id));
		return $query;
	}

	function get_insert($insert)
	{
		$this->db->insert('data_peralatan',$insert);
	}

	function get_update($update,$id_peralatan)
	{
		$this->db->where('id_peralatan',$id_peralatan);
		$this->db->update('data_peralatan',$update);
	}

	function get_delete($id_peralatan)
	{
		$this->db->where('id_peralatan',$id_peralatan);
		$this->db->delete('data_peralatan');
	}

	function insert_kategori($insert)
	{
		$this->db->insert('main_kategori_peralatan',$insert);
	}

	function update_kategori($update,$id_kategori)
	{
		$this->db->where('id_main_kategori_peralatan',$id_kategori);
		$this->db->update('main_kategori_peralatan',$update);
	}

	function delete_kategori($id_kategori)
	{
		$this->db->where('id_main_kategori_peralatan',$id_kategori);
		$this->db->delete('main_kategori_peralatan');
	}

	function insert_sub($insert)
	{
		$this->db->insert('sub_kategori_peralatan',$insert);
	}

	function update_sub($update,$id_sub)
	{
		$this->db->where('id_sub_kategori_peralatan',$id_sub);
		$this->db->update('sub_kategori_peralatan',$update);
	}

	function delete_sub($id_sub)
	{
		$this->db->where('id_sub_kategori_peralatan',$id_sub);
		$this->db->delete('sub_kategori_peralatan');
	}
}
