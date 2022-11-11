<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Beranda
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Beranda extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$status = $this->session->userdata('role');
		if (!isset($status)) {
			redirect(base_url("Login"));
		}

		$this->load->model('Login_model');
		$this->load->model('Model_order');
		$this->load->model('Model_produksi');
		$this->load->model('Model_rekap');
	}

	public function index()
	{
		$status = $this->session->userdata('role');
		if ($status != 1) {
			redirect(base_url("Login"));
		}
		$data['total_order'] = $this->Model_order->jumlahOrder();
		$data['total_bulanan'] = $this->Model_order->getSumBulanan();
		$data['total_harian'] = $this->Model_order->getSumToday();
		$data['total_orderUnfinish'] = $this->Model_order->jumlahOrderUnfinish();
		$data['total_orderFinish'] = $this->Model_order->jumlahOrderFinish();
		$data['total_orderComplain'] = $this->Model_order->jumlahOrderComplain();
		$data['total_orderUrgent'] = $this->Model_order->jumlahOrderUrgent();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('dashboard/_partials/footer');
	}



	public function berita_acara()
	{
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/berita_acara');
		$this->load->view('dashboard/_partials/footer');
	}

	public function surat_jalan()
	{
		$data['orderMasuk'] = $this->Model_order->finishedJob()->result();;
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/surat_jalan', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function pembayaran()
	{
		$data['allPembayaran'] = $this->Model_order->getAllBayar()->result();
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/pembayaran', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function stok()
	{
		$data['allPembayaran'] = $this->Model_order->getAllStok()->result();
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/stok', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function input_surat_jalan($id_order)
	{

		$where = array('id_order' => $id_order);
		$data['bahan'] = $this->Model_order->input_surat_jalan($where, 'orderan')->result();
		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/input_surat_jalan', $data);
		$this->load->view('dashboard/_partials/footer');
	}


	function update_surat_jalan()
	{
		$id_surat = $this->input->post('id_surat');
		$id_order = $this->input->post('id_order');
		$tgl_kirim = $this->input->post('tgl_kirim');
		$plat_nomor = $this->input->post('plat_nomor');
		$jenis_kendaraan = $this->input->post('jenis_kendaraan');

		$data = array(
			'id_surat' => $id_surat,
			'id_order' => $id_order,
			'jenis_kendaraan' => $jenis_kendaraan,
			'tgl_kirim' => $tgl_kirim,
			'plat_nomor' => $plat_nomor
		);

		$data2 = array(
			'status' => 7
		);

		$where2 = array(
			'id_order' => $id_order
		);

		$this->Model_order->update($where2, $data2, 'orderan');
		$this->Model_order->input_data($data, 'surat_jalan');
		$this->session->set_flashdata('surat_berhasil', ' ');
		redirect('Beranda/surat_jalan');
	}
}


/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */
