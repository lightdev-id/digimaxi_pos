<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    
    }
		$this->load->model('Model_produksi');
		$this->load->model('Model_spk');
		$this->load->model('Model_finishing');
	}

	public function index()
	{
		
	}

	public function a3()
	{
	$data['orderMasuk'] = $this->Model_produksi->getCetakA3()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/a3', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function indoor()
	{
	$data['orderMasuk'] = $this->Model_produksi->getCetakIndoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/indoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function outdoor()
	{
	$data['orderMasuk'] = $this->Model_produksi->getCetakOutdoor()->result();;
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('produksi/outdoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}




	function selesai_kerja(){

	$id_order = $this->input->post('id_order');

	$data = array(
		'status' => 2,
		);

	$where = array(
		'id_order' => $id_order
	);

	$this->Model_spk->update_order_produksi($where,$data,'orderan');
	$this->session->set_flashdata('kerja_selesai', ' ');
	redirect('Beranda');
}


function konfirmasi_bayar(){

	$id_order = $this->uri->segment(3);

	$data = array(
		'status_bayar' => 1,
		);

	$where = array(
		'id_order' => $id_order
	);

	$this->Model_spk->update_order_produksi($where,$data,'orderan');
	$this->session->set_flashdata('kerja_selesai', ' ');
	redirect('Beranda/pembayaran');
}

public function finishing()
{
	$id_order = $this->uri->segment(3);

	$data = array(
		'status' => 2,
		);

	$where = array(
		'id_order' => $id_order
	);

	$this->Model_finishing->update_status_finishing($where,$data,'orderan');
	$this->session->set_flashdata('kerja_selesai_produksi', ' ');
	redirect('Beranda');
}

}

/* End of file Produksi.php */
/* Location: ./application/controllers/Produksi.php */