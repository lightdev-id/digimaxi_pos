<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_produksi extends CI_Model
{

	public function getCetakPrinting()
	{
		$this->db->select('*');
		$status = array('status' => 1);
		$this->db->where($status);
		$this->db->from('orderan');
		$this->db->join('customer', 'customer.id = orderan.nama');
		$query = $this->db->get();
		return $query;
	}

	public function getCetakHeating()
	{
		$this->db->select('*');
		$status = array('status' => 3);
		$this->db->where($status);
		$this->db->from('orderan');
		$this->db->join('customer', 'customer.id = orderan.nama');
		$query = $this->db->get();
		return $query;
	}

	public function getCetakCutting()
	{
		$this->db->select('*');
		$kategori = array('kategori' => '4', 'status' => 1);
		$this->db->where($kategori);
		$this->db->from('orderan');
		$this->db->join('customer', 'customer.id = orderan.nama');
		$query = $this->db->get();
		return $query;
	}

	public function getCetakFinishing()
	{
		$this->db->select('*');
		$kategori = array('kategori' => '5', 'status' => 1);
		$this->db->where($kategori);
		$this->db->from('orderan');
		$this->db->join('customer', 'customer.id = orderan.nama');
		$query = $this->db->get();
		return $query;
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
