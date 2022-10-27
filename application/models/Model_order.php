<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model {

  public function getSumBulanan()
    {
        $this->db->select_sum('harga_bahan');
        $array = array('MONTH(tgl_order)' => date('m'), 'status_bayar' => 1);
        $this->db->where($array);
        $query = $this->db->get('orderan');
        if ($query->num_rows() > 0) {
            return $query->row()->harga_bahan;
        } else {
            return 0;
        }
    }

    public function getSumToday()
    {
        $this->db->select_sum('harga_bahan');
        $array = array('tgl_order' => date('y-m-d'), 'status_bayar' => 1);
        $this->db->where($array);
        $query = $this->db->get('orderan');
        if ($query->num_rows() > 0) {
            return $query->row()->harga_bahan;
        } else {
            return 0;
        }
    }

	public function jumlahOrder()
{   
    $query = $this->db->get('orderan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderUnfinish()
{   
    $this->db->select('*');
	$this->db->from('orderan');
	$this->db->where('status', 0);
	$query = $this->db->get();

    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderFinish()
{   
    $this->db->select('*');
  $this->db->from('orderan');
  $this->db->where('status', 3);
  $query = $this->db->get();

    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderComplain()
{   
    $this->db->select('*');
  $this->db->from('orderan');
  $this->db->where('status', 4);
  $query = $this->db->get();

    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderUrgent()
{   
    $this->db->select('*');
  $this->db->from('orderan');
  $this->db->where('urgensi', 1);
  $query = $this->db->get();

    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderA3()
  {
    $this->db->select('*');
    $kategori = array('kategori'=> 1, 'status' => 2);
    $this->db->where($kategori);
    $this->db->from('orderan'); 
    $query = $this->db->get();
    
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function jumlahOrderIndoor()
  {
    $this->db->select('*');
    $kategori = array('kategori'=> 2, 'status' => 2);
    $this->db->where($kategori);
    $this->db->from('orderan'); 
    $query = $this->db->get();
    
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function jumlahOrderOutdoor()
  {
    $this->db->select('*');
    $kategori = array('kategori'=> 3, 'status' => 2);
    $this->db->where($kategori);
    $this->db->from('orderan'); 
    $query = $this->db->get();
    
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}


public function finishedJob()
  {
    $this->db->select('*');
    $kategori = array('status_bayar'=> 1, 'status' => 3);
    $this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');   
     $this->db->join('kategori','orderan.kategori = kategori.id','LEFT');
     $this->db->join('bahan', 'orderan.id_barang = bahan.id_bahan');      
    $query = $this->db->get();
    return $query;
}


function get_customer()
	{
   return $this->db->get('customer')->result_array();
	}

function get_kategori()
  {
   return $this->db->get('kategori')->result_array();
  }

  function get_bahanBaku()
  {
   return $this->db->get('bahan')->result_array();
  }

  function input_data($data,$table){
    $this->db->insert($table,$data);
  }

  function update($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  public function getAllBayar()
  {
  $this->db->select('*');
  $kategori = array('status_bayar' => 0);
  $this->db->where($kategori);
    $this->db->from('orderan');
    $this->db->join('customer','customer.id = orderan.nama');
    $this->db->join('kategori','orderan.kategori = kategori.id','LEFT');      
    $query = $this->db->get();
    return $query;
}

public function getAllStok()
  {
    $this->db->select('*');
    $this->db->from('stok');
    $this->db->join('bahan', 'stok.id_barang = bahan.id_bahan');
    $this->db->join('kategori', 'bahan.id_kategori = kategori.id');   
    $query = $this->db->get();
    return $query;
}

  function cari($id){
        $query= $this->db->get_where('bahan',array('id_bahan'=>$id));
        return $query;
    }

    function cariBahan($id){
      $query= $this->db->get_where('bahan',array('id_kategori'=>$id));
      return $query;
  }

    function suratJalan($id){
        $query= $this->db->get_where('orderan',array('id_order'=>$id));
        return $query;
    }

  function input_surat_jalan($where,$table){      
   return $this->db->select('*')->from($table)->join('customer', 'customer.id=orderan.nama')->join('bahan', 'bahan.id_bahan=orderan.id_barang')->where($where)->get();
}


}

/* End of file Model_order.php */
/* Location: ./application/models/Model_order.php */