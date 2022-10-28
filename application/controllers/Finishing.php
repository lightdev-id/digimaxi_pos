<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finishing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_finishing');
	}

	public function index()
	{
	}

	public function cutting()
	{
		$data['finishCutting'] = $this->Model_finishing->getFinishingCutting()->result();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('finishing/cutting', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function packing()
	{
		$data['finishPacking'] = $this->Model_finishing->getFinishingPacking()->result();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('finishing/packing', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function finishing_cutting()
	{
		$id_order = $this->uri->segment(3);

		$data = array(
			'status' => 5,
			'finishing' => 'packing'
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_finishing->update_status_finishing($where, $data, 'orderan');
		$this->session->set_flashdata('finishing_cutting', ' ');
		redirect('Finishing/cutting');
	}

	public function finishing_packing()
	{
		$id_order = $this->uri->segment(3);

		$data = array(
			'status' => 6,
			'finishing' => 'selesai'
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_finishing->update_status_finishing($where, $data, 'orderan');
		$this->session->set_flashdata('finishing_packing', ' ');
		redirect('Finishing/packing');
	}
}

/* End of file Finishing.php */
/* Location: ./application/controllers/Finishing.php */
