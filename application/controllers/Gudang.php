<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $status = $this->session->userdata('role');
    if(!isset($status)){
      redirect(base_url("Login"));
    }
		$this->load->model('Model_gudang');
		$this->load->model('Model_order');
	}

	public function index()
	{
			$data['bahanBaku'] = $this->Model_order->get_bahanBaku();

	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('gudang/input', $data);				
	$this->load->view('dashboard/_partials/footer');

	}

	public function barang_masuk()
	{
		$data['barangMasuk'] = $this->Model_gudang->getHistoryStok();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('gudang/masuk',$data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function barang_keluar()
	{
		$data['barangKeluar'] = $this->Model_gudang->getBarangKeluar();
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('gudang/keluar', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function barang_datang()
	{
	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('gudang/datang');				
	$this->load->view('dashboard/_partials/footer');
	}

	public function barang_retur()
	{
		// $data['barangRetur'] = $this->Model_gudang->getBarangRetur();
		$data['stokRetur'] = $this->Model_gudang->getStokRetur();

	$this->load->view('dashboard/_partials/header');
	$this->load->view('dashboard/_partials/sidebar');
	$this->load->view('gudang/retur', $data);				
	$this->load->view('dashboard/_partials/footer');
	}

	public function tambah_stok()
	{
		$data['bahanBaku'] = $this->Model_order->get_bahanBaku();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('gudang/stok/tambah', $data);				
		$this->load->view('dashboard/_partials/footer');
	}

	public function insert_pembelian()
	{
		$id_beli= uniqid();
		$no_po = $this->input->post('no_po');
		$id_barang = $this->input->post('id_bahan');
		$jumlah = $this->input->post('jumlah');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'id_beli' => $id_beli,
			'no_po' => $no_po,
			'id_barang' => $id_barang,
			'jumlah' => $jumlah,
			'tgl_beli' => $tanggal,
			);
		
		$data2 = array(
			'id_barang' => $id_barang,
			'stok' => $jumlah,
		);

		$this->db->where('id_barang', $id_barang);
		$b = $this->db->get('pembelian');

		if ($b->num_rows() > 0) {
			$this->db->where('id_barang', $id_barang);
			$this->Model_gudang->input_data($data, 'pembelian');
			$this->session->set_flashdata('pembelian_sukses', ' ');
			redirect('Beranda/stok');
		} else {;
			$this->Model_gudang->input_data($data, 'pembelian');
			$this->Model_gudang->input_data($data2, 'stok');
			$this->session->set_flashdata('pembelian_sukses', ' ');
			redirect('Beranda/stok');
		}
	}

	public function retur_barang($id_beli)
	{
		$data['barangRetur'] = $this->Model_gudang->BarangRetur($id_beli);

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('gudang/stok/retur_barang', $data);				
		$this->load->view('dashboard/_partials/footer');
	}

	public function retur_update()
	{
		$id_beli = $this->input->post('id_beli');
		$jumlah = $this->input->post('jumlah');
		// $where = array('id_beli' => $id_beli);
		
		$id_barang = $this->input->post('id_barang');
		// $stok_lama = $this->input->post('stok_lama');
		$tanggal_retur = $this->input->post('tanggal_retur');
		$keterangan = $this->input->post('keterangan');

		// $data_pembelian = array(
		// 	'jumlah' => $stok_lama - $jumlah,
		// );

		$data_stokRetur = array(
			'id_retur' => uniqid(),
			'id_beli' => $id_beli,
			'id_barang' => $id_barang,
			'jumlah_retur' => $jumlah,
			'tanggal_retur' => $tanggal_retur,
			'keterangan' => $keterangan
		);

		$this->Model_gudang->input_data($data_stokRetur, 'stok_retur');
		// $this->Model_gudang->update_data($where, $data_pembelian, 'pembelian');
		$this->session->set_flashdata('retur_sukses', ' ');
		redirect('Gudang/barang_masuk');
	}

	public function retur_detail($id_beli)
	{
		$data['returDetail'] = $this->Model_gudang->detailStokRetur($id_beli);

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('gudang/stok/retur_detail', $data);				
		$this->load->view('dashboard/_partials/footer');
	}

	public function cek_stok($id_barang)
	{
		$cek_stok = $this->Model_gudang->cek_stok($id_barang);
		echo json_encode($cek_stok);
	}
}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */
