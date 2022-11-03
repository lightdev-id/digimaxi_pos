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

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
