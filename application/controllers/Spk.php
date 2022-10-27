<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    
    }
		$this->load->model('Model_spk');
		$this->load->model('Model_rekap');
	}

	public function index()
	{
	
	}

	public function a3()
	{
	$data['orderMasuk'] = $this->Model_spk->getReadya3()->result();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('spk/a3', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function indoor()
	{
	$data['orderMasuk'] = $this->Model_spk->getReadyIndoor()->result();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('spk/indoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function outdoor()
	{
	$data['orderMasuk'] = $this->Model_spk->getReadyOutdoor()->result();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('spk/outdoor', $data);				
	$this->load->view('dashboard/_partials/footer');
	}


	function ambil_kerja_a3(){

	$id_order = $this->input->post('id_order');
	$spk = $this->session->userdata('username');
	$tgl_spk = date('Y-m-d');

	$data = array(
		'status' => 1,
		'spk' => $spk,
		'tgl_spk' => $tgl_spk
		);

	$where = array(
		'id_order' => $id_order
	);

	$this->Model_spk->update_order_produksi($where,$data,'orderan');
	$this->session->set_flashdata('update_berhasil', ' ');
	redirect('Beranda');
}

public function download($file,$filename = NULL)
{
	 $data = file_get_contents(base_url('/assets/data/'.$file));
	force_download($filename, $data);
}

public function cetak_spk($id_order)
{
	$this->load->view('dashboard/_partials/header');
	$data['orderDetail'] = $this->Model_rekap->getDetailOrder($id_order);
	$this->load->view('spk/cetak_spk', $data);
}

}

/* End of file Spk.php */
/* Location: ./application/controllers/Spk.php */