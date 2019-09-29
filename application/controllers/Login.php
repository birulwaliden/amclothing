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
		
		$data2['tb_karyawan.username']=$_POST['username'];
		$data2['tb_karyawan.password']= md5($_POST['password']);
		$cek2=$this->Amcloth->cek_login_karyawan($data2);
		if (!isset($cek)) {
			if (!isset($cek2)) {
				$this->session->set_flashdata('error', 'Username/Password Salah');
				redirect('Login');
			}else{
				$user = array(
					'username' => $cek2->username , 
					'id_store' => $cek2->id_store ,
					'nama_store' => $cek2->nama_store , 
					'nama_karyawan' => $cek2->nama_karyawan , 
					'alamat' => $cek2->alamat, 
					'no_hp' => $cek2->no_hp,
					'jenisuser' => '0'
				);
				$this->session->set_userdata($user);
				redirect('karyawan');
			}

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
