<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {
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
		$data['content']=$this->load->view('pages/superadmin/dashboard','',true);
		$this->load->view('default',$data);
	}
	public function barang()
	{
		$data2['barang']=$this->Amcloth->get_barang();
		$data['content']=$this->load->view('pages/superadmin/databarang',$data2,true);
		$this->load->view('default',$data);
	}
	public function stock()
	{
		$data['content']=$this->load->view('pages/superadmin/stock','',true);
		$this->load->view('default',$data);
	}
	public function transaksi()
	{
		$data['content']=$this->load->view('pages/superadmin/transaksi','',true);
		$this->load->view('default',$data);
	}
	public function kategori()
	{
		$data2['kategori']=$this->Amcloth->get_kategori();
		$data['content']=$this->load->view('pages/superadmin/kategori',$data2,true);
		$this->load->view('default',$data);
	}
	public function tambah_kategori()
	{
		$data['nama_kategori']=$_POST['nama'];
		$this->Amcloth->save_kategori($data);
		redirect('superadmin/kategori');
	}
	public function delete_kategori($id)
	{
		$this->Amcloth->delete_kategori($id);
		redirect('superadmin/kategori');
	}
	public function edit_kategori($id)
	{
		$data2['kategori']=$this->Amcloth->edit_kategori($id);
		$data['content']=$this->load->view('pages/superadmin/edit_kategori',$data2,true);
		$this->load->view('default',$data);

		echo json_encode($data2);
	}
	public function update_kategori()
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$this->Amcloth->update_kategori($id,$nama);
		redirect('superadmin/kategori');
	}
}
