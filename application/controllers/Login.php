<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Amcloth');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('logincoba');
	}
	public function cek_login()
	{
		$data['username']=$_POST['username'];
		$data['password']= md5($_POST['password']);
		$cek=$this->Amcloth->cek_login($data);
		if (!isset($cek)) {
			$this->session->set_flashdata('error', 'Username/Password Salah');
			redirect('Login');
		}else{
			$user = array(
				'username' => $cek->username , 
				'id_store' => $cek->id_store ,
				'nama_store' => $cek->nama_store , 
				'alamat' => $cek->alamat , 
				'no_hp' => $cek->no_hp,
				'jenisuser' => $cek->JenisUser
			);
			$this->session->set_userdata($user);

			if ($cek->JenisUser==0) {
				redirect('karyawan');
			}elseif ($cek->JenisUser==1) {
				redirect('admin');
			}else {
				redirect('superadmin');
			}
		}
		// echo json_encode($cek);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
