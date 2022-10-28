<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_finishing extends CI_Model
{
	public function getFinishingCutting()
   {
      $this->db->select('*');
      $status = array('status' => 4);
      $this->db->where($status);
      $this->db->from('orderan');
      $this->db->join('customer', 'orderan.nama = customer.id');
      $query = $this->db->get();
      return $query;
   }
	
   public function getFinishingPacking()
   {
      $this->db->select('*');
      $finishing = array('finishing' => 'packing', 'status' => 5);
      $this->db->where($finishing);
      $this->db->from('orderan');
      $this->db->join('customer', 'orderan.nama = customer.id');
      $query = $this->db->get();
      return $query;
   }

   public function update_status_finishing($where, $data, $table)
   {
      $this->db->where($where);
      $this->db->update($table, $data);
   }
}
