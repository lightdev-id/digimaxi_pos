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

	public function getDetailUtang($id_order)
	{
		$this->db->select('*');
		$this->db->from('orderan');
		$this->db->join('bahan', 'orderan.id_barang = bahan.id_bahan');
		$this->db->join('customer', 'customer.id = orderan.nama');
		$this->db->join('surat_utang', 'orderan.id_order = surat_utang.id_order');
		$this->db->where('orderan.id_order', $id_order);
		$query = $this->db->get();
		return $query->row();
	}

	public function getTableUtang()
	{
		$this->db->select('*');
		$this->db->from('surat_utang');
		$this->db->join('orderan', 'orderan.id_order = surat_utang.id_order');
		$query = $this->db->get();
		return $query;
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */
