<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$status = $this->session->userdata('role');
		if (!isset($status)) {
			redirect(base_url("Login"));
		}
		$this->load->model('Model_produksi');
		$this->load->model('Model_spk');
		$this->load->model('Model_finishing');
	}

	public function index()
	{
	}

	public function printing()
	{
		$data['orderMasuk'] = $this->Model_produksi->getCetakPrinting()->result();;
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('produksi/printing', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function heating()
	{
		$data['orderMasuk'] = $this->Model_produksi->getCetakHeating()->result();;
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('produksi/heating', $data);
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




	function selesai_kerja()
	{

		$id_order = $this->input->post('id_order');

		$data = array(
			'status' => 2,
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_spk->update_order_produksi($where, $data, 'orderan');
		$this->session->set_flashdata('kerja_selesai', ' ');
		redirect('Beranda');
	}


	function konfirmasi_bayar()
	{

		$id_order = $this->uri->segment(3);

		$data = array(
			'status_bayar' => 1,
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_spk->update_order_produksi($where, $data, 'orderan');
		$this->session->set_flashdata('kerja_selesai', ' ');
		redirect('Beranda/pembayaran');
	}

	public function produksi_printing_selesai()
	{
		$id_order = $this->uri->segment(3);

		$data = array(
			'status' => 2,
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_finishing->update_status_finishing($where, $data, 'orderan');
		$this->session->set_flashdata('printing_selesai', ' ');
		redirect('Produksi/printing');
	}

	public function produksi_heating_selesai()
	{
		$id_order = $this->uri->segment(3);

		$data = array(
			'status' => 4,
		);

		$where = array(
			'id_order' => $id_order
		);

		$this->Model_finishing->update_status_finishing($where, $data, 'orderan');
		$this->session->set_flashdata('heating_selesai', ' ');
		redirect('Produksi/heating');
	}

	public function surat_utang($id_order)
	{
		$data['orderUtang'] = $this->Model_produksi->getDetailUtang($id_order);
		$this->load->view('dashboard/_partials/header');
		$this->load->view('rekap/cetak_surat_utang', $data);
	}
	
}

/* End of file Produksi.php */
/* Location: ./application/controllers/Produksi.php */
