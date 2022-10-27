<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produksi extends CI_Model {

public function getCetakA3()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '1','status' => 1);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');
    $this->db->join('kategori','orderan.kategori = kategori.id','LEFT');      
    $query = $this->db->get();
    return $query;
}

public function getCetakIndoor()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '2','status' => 1);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getCetakOutdoor()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '3','status' => 1);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getCetakCutting()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '4','status' => 1);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}

public function getCetakFinishing()
	{
	$this->db->select('*');
	$kategori = array('kategori' => '5','status' => 1);
	$this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');      
    $query = $this->db->get();
    return $query;
}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */