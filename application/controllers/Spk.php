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

	public function printing()
	{
	$data['orderMasuk'] = $this->Model_spk->getReadyPrinting()->result();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('spk/printing', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function heating()
	{
	$data['orderMasuk'] = $this->Model_spk->getReadyHeating()->result();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('spk/heating', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	function ambil_kerja_printing(){

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
	$this->session->set_flashdata('printing_selesai', ' ');
	redirect('Spk/printing');
}

function ambil_kerja_heating(){

	$id_order = $this->input->post('id_order');

	$data = array(
		'status' => 3,
		);

	$where = array(
		'id_order' => $id_order
	);

	$this->Model_spk->update_order_produksi($where,$data,'orderan');
	$this->session->set_flashdata('heating_selesai', ' ');
	redirect('Spk/heating');
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
