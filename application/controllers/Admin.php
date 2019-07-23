<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Amcloth');
		// $this->load->library('Zend');
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
		$data['content']=$this->load->view('pages/admin/dashboard','',true);
		$this->load->view('default',$data);
	}
	public function barang()
	{
		$data2['barang']=$this->Amcloth->get_barang();
		$data2['kategori']=$this->Amcloth->get_kategori();
		$data['content']=$this->load->view('pages/admin/databarang',$data2,true);
		$this->load->view('default',$data);
	}
	public function stock()
	{
		$data['content']=$this->load->view('pages/admin/stock','',true);
		$this->load->view('default',$data);
	}
	public function transaksi()
	{
		$data['content']=$this->load->view('pages/admin/transaksi','',true);
		$this->load->view('default',$data);
	}
	public function kategori()
	{
		$data2['kategori']=$this->Amcloth->get_kategori();
		$data['content']=$this->load->view('pages/admin/kategori',$data2,true);
		$this->load->view('default',$data);
	}
	public function tambah_kategori()
	{
		$data['nama_kategori']=$_POST['nama'];
		$this->Amcloth->save_kategori($data);
		redirect('admin/kategori');
	}
	public function delete_kategori($id)
	{
		$this->Amcloth->delete_kategori($id);
		redirect('admin/kategori');
	}
	public function edit_kategori($id)
	{
		$data2['kategori']=$this->Amcloth->edit_kategori($id);
		$data['content']=$this->load->view('pages/admin/edit_kategori',$data2,true);
		$this->load->view('default',$data);

		echo json_encode($data2);
	}
	public function update_kategori()
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$this->Amcloth->update_kategori($id,$nama);
		redirect('admin/kategori');
	}
	public function save_barang()
	{
		$data['nama_barang']=$_POST['nama'];
		$data['id_kategori']=$_POST['kategori'];
		$data['harga_beli']=$_POST['beli'];
		$data['harga_jual']=$_POST['jual'];
		$data['foto']=$_FILES["foto"]["name"];
		$data['ukuran']=$_POST['ukuran'];
		$barang=count($this->Amcloth->get_barang()) + 1;
		$nama= explode(' ', trim($data['nama_barang']));
		$data['kode_barang']=$nama[0].$data['id_kategori'].$data['ukuran'].$barang;

		$config['upload_path']          = './fotoproduk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			//$this->session->set_flashdata('alert','gagal');
// redirect('halaman');
			//redirect($_SERVER['HTTP_REFERER']);

			echo json_encode($error);
		}else{
			$this->Amcloth->save_barang($data);
			redirect('admin/barang');
		}
		
	}
	public function hapus_barang($kode)
	{
		$this->Amcloth->hapus_barang($kode);
		redirect('admin/barang');
	}
	public function edit_barang($kode)
	{
		$data2['barang']=$this->Amcloth->edit_barang($kode);
		$data2['kategori']=$this->Amcloth->get_kategori();
		$data['content']=$this->load->view('pages/admin/edit_barang',$data2,true);
		$this->load->view('default',$data);	
	}
	public function update_barang()
	{


		
		if (empty($_FILES["foto"]["name"])) {
			$data['nama_barang']=$_POST['nama'];
			$data['id_kategori']=$_POST['kategori'];
			$data['harga_beli']=$_POST['beli'];
			$data['harga_jual']=$_POST['jual'];
			$data['ukuran']=$_POST['ukuran'];
			$kode=$_POST['kode'];
			$this->Amcloth->update_barang($data,$kode);
			redirect('admin/barang');

		}else{
			$data['nama_barang']=$_POST['nama'];
			$data['id_kategori']=$_POST['kategori'];
			$data['harga_beli']=$_POST['beli'];
			$data['harga_jual']=$_POST['jual'];
			$data['ukuran']=$_POST['ukuran'];
			$data['foto']=$_FILES["foto"]["name"];
			$kode=$_POST['kode'];


			$config['upload_path']          = './fotoproduk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			//$this->session->set_flashdata('alert','gagal');
// redirect('halaman');
			//redirect($_SERVER['HTTP_REFERER']);

				echo json_encode($error);
			}else{
				$this->Amcloth->update_barang($data,$kode);
				redirect('admin/barang');
			}


		}


	}

	public function penjualan()
	{
		// $id = $this->session->userdata('id_store');
		$data2['penjualan']=$this->Amcloth->get_laporan_penjualan();
		$data['content']=$this->load->view('pages/admin/datapenjualan',$data2,true);
		$this->load->view('default',$data);
		// echo json_encode($data2);
	}

	public function detailpenjualan($id)
	{
		// $id = $this->session->userdata('id_store');
		$data2['history']=$this->Amcloth->get_struk($id);
		$data['content']=$this->load->view('pages/admin/detailpenjualan',$data2,true);
		$this->load->view('default',$data);
		// echo json_encode($data2);
	}

	public function cobabarcode()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode('XY12012');
	}

	public function set_barcode($code)
	{
		//load library
		$this->load->library('Zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		$file = Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
		// $store_image = imagepng($file,"1.png");
		// echo json_encode($file);
	}
}
