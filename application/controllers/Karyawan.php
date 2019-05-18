<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
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
		$data['content']=$this->load->view('pages/Karyawan/dashboard','',true);
		$this->load->view('default_karyawan',$data);
	}
	public function stock()
	{
		$data2['stock']=$this->Amcloth->get_stock();
		$data2['barang']=$this->Amcloth->get_barang();
		$data['content']=$this->load->view('pages/Karyawan/stock',$data2,true);
		$this->load->view('default_karyawan',$data);
	}
	public function transaksi()
	{
		$data['content']=$this->load->view('pages/Karyawan/transaksi','',true);
		$this->load->view('default_karyawan',$data);
	}
	public function save_stock()
	{
		$kode_barang= $_POST['barang'];
		$data['kode_barang']=$kode_barang;
		$data['jumlah']=$_POST['jumlah'];
		$data['id_store']=$_POST['id'];
		$store = $_POST['store'];
		if ($store > 0	) {
			$ambil = $_POST['jumlah'];
			$jumlah =$this->Amcloth->get_jumlah_stock($kode_barang,$store);
			$jumlah = $jumlah->jumlah - $ambil;
			$this->Amcloth->update_jumlah_stock($kode_barang,$store,$jumlah);
			// echo json_encode($jumlah);
		}

		$this->Amcloth->save_stock($data);


		redirect('karyawan/stock');
	}
}
