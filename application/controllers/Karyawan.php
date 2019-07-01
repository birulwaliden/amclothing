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

	function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('produk_id'), 
			'name' => $this->input->post('produk_nama'), 
			'qty' => $this->input->post('quantity'), 
			'price' => $this->input->post('produk_harga'), 
			// 'ukuran' => $this->input->post('ukuran'), 
		);
		$this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
		// echo json_encode($data);
    }

    function show_cart(){ //Fungsi untuk menampilkan Cart
    	$output = '';
    	$no = 0;
    	foreach ($this->cart->contents() as $items) {
    		$no++;
    		$output .='
    		<tr>
    		<td>'.$items['name'].'</td>
    		<td>'.number_format($items['price']).'</td>
    		<td>'.$items['qty'].'</td>
    		<td>'.number_format($items['subtotal']).'</td>
    		<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
    		</tr>
    		';
    	}

    	$output .= '
    	<tr>
    	<th colspan="3">Total</th>
    	<th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
    	</tr>
    	';
    	return $output;
    }

    function load_cart(){ //load data cart
    	echo $this->show_cart();
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
    	$data = array(
    		'rowid' => $this->input->post('row_id'), 
    		'qty' => 0, 
    	);
    	$this->cart->update($data);
    	echo $this->show_cart();
    }

    function get_barang_stock(){
    	$kode=$this->input->post('kode');
    	$data=$this->Amcloth->get_stock_by_id($kode);
    	echo json_encode($data);
    }
}
