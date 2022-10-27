<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    }
		$this->load->model('Model_rekap');
	}

	public function index()
	{
		
	}

	public function a3()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakA3()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/a3', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function indoor()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakIndoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/indoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function outdoor()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakOutdoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/outdoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function cutting()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakCutting()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/cutting', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function finishing()
	{
	$data['orderMasuk'] = $this->Model_rekap->getCetakFinishing()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/finishing', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function laporan_cetak()
	{
		$data['laporanCetak'] = $this->Model_rekap->getLaporanCetak();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('rekap/laporan', $data);				
		$this->load->view('dashboard/_partials/footer');
	}

	public function detail($id_order)
	{
		$data['rekapDetail'] = $this->Model_rekap->getDetailLaporan($id_order);
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('rekap/detail', $data);				
		$this->load->view('dashboard/_partials/footer');
	}

	public function genCode(){
		$this->db->select('RIGHT(orderan.no_inv,5) as no_inv', FALSE);
		$this->db->order_by('no_inv','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('orderan');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->no_inv) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "INV-".$batas;
		echo json_encode($kodetampil);
	}

	public function cetak_inv($id_order)
	{
		
		$data['rekapDetail'] = $this->Model_rekap->getDetailLaporan($id_order);
		$this->load->view('dashboard/_partials/header');
		$this->load->view('rekap/cetak_invoice', $data);
	}

	public function cetak_surat_jalan($id_order)
	{
		$data['rekapDetail'] = $this->Model_rekap->getDetailLaporan($id_order);
		$this->load->view('dashboard/_partials/header');
		$this->load->view('rekap/cetak_surat_jalan', $data);
	}

	

}

/* End of file Rekap.php */
/* Location: ./application/controllers/Rekap.php */