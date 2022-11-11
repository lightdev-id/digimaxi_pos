<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$status = $this->session->userdata('role');
		if (!isset($status)) {
			redirect(base_url("Login"));
		}
		$this->load->model('Model_rekap');
		$this->load->model('Model_order');
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

	public function genCode()
	{
		$this->db->select('RIGHT(orderan.no_inv,5) as no_inv', FALSE);
		$this->db->order_by('no_inv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('orderan');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->no_inv) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
		$kodetampil = "INV-" . $batas;
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

	public function input_surat_utang($id_order)
	{
		$where = array('id_order' => $id_order);
		$data['bahan'] = $this->Model_order->input_surat_jalan($where, 'orderan')->result();

		$this->load->view('dashboard/_partials/header');
		$this->load->view('dashboard/_partials/sidebar');
		$this->load->view('dashboard/input_surat_utang', $data);
		$this->load->view('dashboard/_partials/footer');
	}

	public function save_surat_utang()
	{
		$id_utang = $this->input->post('id_utang');
		$id_order = $this->input->post('id_order');
		$tgl_cetak = $this->input->post('tgl_cetak');
		$tgl_jatuh_tempo = $this->input->post('tgl_jatuh_tempo');
		$total_jatuh_tempo = $this->input->post('total_jatuh_tempo');
		$keterangan = $this->input->post('keterangan');

		$hapusSelainAngka_totalJT = preg_replace('/[^0-9]/', '', $total_jatuh_tempo);

		$data = array(
			'id_utang' => $id_utang,
			'id_order' => $id_order,
			'tgl_cetak' => $tgl_cetak,
			'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
			'total_jatuh_tempo' => $hapusSelainAngka_totalJT,
			'keterangan' => $keterangan
		);

		$where2 = array(
			'id_order' => $id_order
		);
		$data2 = array(
			'ket_surat_utang' => 'Sudah di Input'
		);

		$this->Model_order->input_data($data, 'surat_utang');
		$this->Model_order->update($where2, $data2, 'orderan');
		$this->session->set_flashdata('surat_utang_berhasil', ' ');
		redirect('Beranda/pembayaran');
	}
}

/* End of file Rekap.php */
/* Location: ./application/controllers/Rekap.php */
