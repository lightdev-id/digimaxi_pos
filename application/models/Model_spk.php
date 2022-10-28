<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_spk extends CI_Model {

public function getReadyPrinting()
	{
	$this->db->select('*');
	$status = array('status' => 0);
	$this->db->where($status);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');
    $query = $this->db->get();
    return $query;
}

public function getReadyHeating()
	{
	$this->db->select('*');
	$status = array('status' => 2);
	$this->db->where($status);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getReadyOutdoor()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '3','status' => 0);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getReadyCutting()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '4','status' => 0);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getReadyFinishing()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '5','status' => 0);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

function update_order_produksi($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}

/* End of file Model_spk.php */
/* Location: ./application/models/Model_spk.php */
