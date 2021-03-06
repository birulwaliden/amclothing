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
	 * Since this controller is set as the default_superadmin controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$store1 = $this->Amcloth->get_penjualan_by_store('1');
		$store2 = $this->Amcloth->get_penjualan_by_store('2');
		// $store3 = $this->Amcloth->get_penjualan_by_store('3');
		$terbanyak = $this->Amcloth->get_terbanyak('3');

		// echo json_encode($terbanyak);
		$data['store1'] = $store1;
		$data['store2'] = $store2;
		// $data['store3'] = $store3;
		$data['terbanyak'] = $terbanyak;

		$data['content']=$this->load->view('pages/superadmin/dashboard',$data,true);
		$this->load->view('default_superadmin',$data);
	}
	public function barang()
	{
		$data2['barang']=$this->Amcloth->get_barang();
		$data['content']=$this->load->view('pages/superadmin/databarang',$data2,true);
		$this->load->view('default_superadmin',$data);
	}
	public function stock()
	{
		$data['content']=$this->load->view('pages/superadmin/stock','',true);
		$this->load->view('default_superadmin',$data);
	}
	public function transaksi()
	{
		$data['content']=$this->load->view('pages/superadmin/transaksi','',true);
		$this->load->view('default_superadmin',$data);
	}
	// public function kategori()
	// {
	// 	$data2['kategori']=$this->Amcloth->get_kategori();
	// 	$data['content']=$this->load->view('pages/superadmin/kategori',$data2,true);
	// 	$this->load->view('default_superadmin',$data);
	// }

	public function store()
	{
		$data2['store']=$this->Amcloth->get_store();
		$data['content']=$this->load->view('pages/superadmin/datastore',$data2,true);
		$this->load->view('default_superadmin',$data);
	}


	public function karyawan()
	{

		$data2['store']=$this->Amcloth->get_store();
		$data2['karyawan']=$this->Amcloth->get_karyawan();
		$data['content']=$this->load->view('pages/superadmin/karyawan',$data2,true);
		$this->load->view('default_superadmin',$data);
	}

	public function tambah_karyawan()
	{
		$data['nama_karyawan']=$_POST['nama'];
		$data['username']=$_POST['username'];
		$data['id_store']=$_POST['id_store'];
		$data['no_hp']=$_POST['nohp'];
		$data['password']=md5($_POST['username']);
		$cek = $this->Amcloth->cek_username($data['username']);
		if ($cek > 0) {
			$this->session->set_flashdata('msg','Username sudah ada , silahkan gunakan username lain');
			redirect('superadmin/karyawan');	
		}else{
			$cek_hp = $this->Amcloth->cek_hp($data['no_hp']);
			if ($cek_hp > 0) {
				$this->session->set_flashdata('msg','No HP sudah ada , silahkan gunakan yang lain');
				redirect('superadmin/store');	
			}else{
				$this->Amcloth->save_karyawan($data);
				redirect('superadmin/karyawan');	
			}
		}

	}

	public function tambah_kategori()
	{
		$data['nama_kategori']=$_POST['nama'];
		$this->Amcloth->save_kategori($data);
		redirect('superadmin/kategori');
	}

	public function tambah_store()
	{
		$data['nama_store']=$_POST['nama'];
		$data['username']=$_POST['username'];
		$data['alamat']=$_POST['alamat'];
		$data['no_hp']=$_POST['nohp'];
		$data['password']=md5($_POST['username']);
		$cek = $this->Amcloth->cek_username($data['username']);
		
		if ($cek > 0) {
			$this->session->set_flashdata('msg','Username sudah ada , silahkan gunakan username lain');
			redirect('superadmin/store');	
		}else{
			$cek_hp = $this->Amcloth->cek_hp($data['no_hp']);
			if ($cek_hp > 0) {
				$this->session->set_flashdata('msg','No HP sudah ada , silahkan gunakan yang lain');
				redirect('superadmin/store');	
			}else{
				$this->Amcloth->save_store($data);
				redirect('superadmin/store');
			}
			
		}
		
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
		$this->load->view('default_superadmin',$data);

		echo json_encode($data2);
	}

	public function delete_store($id)
	{
		$this->Amcloth->delete_store($id);
		$this->session->set_flashdata('msg','Data store telah terhapus');
		redirect('Superadmin/store');
	}

	public function delete_karyawan($id)
	{
		$this->Amcloth->delete_karyawan($id);
		$this->session->set_flashdata('msg','Data karyawan telah terhapus');
		redirect('Superadmin/karyawan');
	}

	public function reset_pass($id)
	{
		
		$this->Amcloth->reset_pass($id);
		$this->session->set_flashdata('msg','Password telah direset');
		redirect('Superadmin/karyawan');
	}

	public function update_kategori()
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$this->Amcloth->update_kategori($id,$nama);
		redirect('superadmin/kategori');
	}

	public function update_store()
	{
		$id=$_POST['id_store'];
		$data['nama_store'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['no_hp'] = $this->input->post('no_hp');
		$this->Amcloth->update_store($id,$data);

		$this->session->set_flashdata('msg','Anda telah merubah data store');
		redirect('superadmin/store');
	}

	public function update_karyawan()
	{
		$id=$_POST['id_karyawan'];
		$data['nama_karyawan'] = $this->input->post('nama');
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('username'));
		$data['no_hp'] = $this->input->post('no_hp');
		$this->Amcloth->update_karyawan($id,$data);

		$this->session->set_flashdata('msg','Anda telah merubah data karyawan');
		redirect('superadmin/karyawan');
	}


}
