<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();	
		 
		$this->load->model('Login_model');
		

	}

	function index(){
		$status = $this->session->userdata('role');
		$this->load->view('dashboard/_partials/header');
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' => $password
			);
	$hasil = $this->Login_model->cek_login($data);
	if ($hasil->num_rows() == 1) {

		foreach ($hasil->result() as $sess) {
		$sess_data['logged_in'] = 'Sudah Login';
		$sess_data['nama'] = $sess->nama;
		$sess_data['username'] = $sess->username;
		$sess_data['role'] = $sess->role;
		$this->session->set_userdata($sess_data);
		}
	$status = $this->session->userdata('role');
	if ($status == 1) 
		 {
			$this->session->set_flashdata('login_berhasil', ' ');
			redirect(base_url("Beranda"));
		}elseif ($status == 2) {
			$this->session->set_flashdata('login_berhasil', ' ');
			redirect(base_url("Spk/printing"));
		}elseif ($status == 3) {
			$this->session->set_flashdata('login_berhasil', ' ');
			redirect(base_url("Gudang"));
		}elseif ($status == 4) {
			$this->session->set_flashdata('login_berhasil', ' ');
			redirect(base_url("Order/input_order"));
		}elseif ($status == 5) {
			$this->session->set_flashdata('login_berhasil', ' ');
			redirect(base_url("Finishing/cutting"));
		}
	}else{
			$this->session->set_flashdata('login_gagal', ' ');
			redirect(base_url("Login"));
		}
		

	
}
	

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}



/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
