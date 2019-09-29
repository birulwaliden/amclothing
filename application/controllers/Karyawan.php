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
		$id = $this->session->userdata('id_store');
		$data['history']=$this->Amcloth->get_grap($id);
		
		$pendapatan=$this->Amcloth->get_penjualan_bulan($id);
		if ($pendapatan == '') {
			$data['pendapatan']=0;
		}else{
			$data['pendapatan']=$pendapatan->pendapatan;
		}
		$data['content']=$this->load->view('pages/Karyawan/dashboard',$data,true);
		$this->load->view('default_karyawan',$data);

		// echo json_encode($data);
	}

	public function detailpenjualan($id)
	{
		// $id = $this->session->userdata('id_store');
		$data2['history']=$this->Amcloth->get_struk($id);
		$data['content']=$this->load->view('pages/admin/detailpenjualan',$data2,true);
		$this->load->view('default_karyawan',$data);
		// echo json_encode($data2);
	}


	public function stock()
	{
		$id = $this->session->userdata('id_store');
		$data2['stock']=$this->Amcloth->get_stock_all();
		$data2['barang']=$this->Amcloth->get_barang();
		$data2['store']=$this->Amcloth->get_store_list($id);
		// foreach ($stock as $s) {

		// }
		$data['content']=$this->load->view('pages/Karyawan/stock',$data2,true);
		$this->load->view('default_karyawan',$data);
		// echo json_encode($data2['stock']);
	}

	public function po()
	{
		$id = $this->session->userdata('id_store');
		$data2['po']=$this->Amcloth->get_po($id);
		// foreach ($stock as $s) {

		// }
		$data['content']=$this->load->view('pages/Karyawan/po',$data2,true);
		$this->load->view('default_karyawan',$data);
		// echo json_encode($stock);
	}

	public function history()
	{
		$id = $this->session->userdata('id_store');
		$data2['history']=$this->Amcloth->get_history($id);
		$data['content']=$this->load->view('pages/Karyawan/history',$data2,true);
		$this->load->view('default_karyawan',$data);
		// echo json_encode($data2);
	}


	public function stockout(){
		$id = $this->session->userdata('id_store');
		$data2['stockout']=$this->Amcloth->get_stockout($id);

		echo json_encode($data2);
	}

	public function laporan_cetak(){
		$mulai = $this->input->post('mulai');
		$sampai = $this->input->post('sampai');
		$tipe = $this->input->post('tipe');

		$data2['mulai'] = $mulai;
		$data2['sampai'] = $sampai;
		$id = $this->session->userdata('id_store');

		if ($mulai != null && $sampai != null) {
			$data2['history']=$this->Amcloth->get_history_tanggal($id,$mulai,$sampai);
		}else{
			$data2['history']=$this->Amcloth->get_history($id);

		}

		if ($data2['history'] != null) {
			if ($tipe == 'PDF') {
				$this->load->view('pages/Karyawan/cetak_pdf', $data2);;
				
			}else{
				$this->load->view('pages/Karyawan/cetak_excel', $data2);;
			}

		}else{
			$this->session->set_flashdata('allert', 'Data tidak ditemukan');
			// $this->session->flashdata('allert','Data tidak ditemukan');
			redirect('Karyawan/history');
		}

		// echo json_encode($data2);

		

	}


	public function transaksi()
	{
		$data['content']=$this->load->view('pages/Karyawan/transaksi','',true);
		$this->load->view('default_karyawan',$data);
	}

	public function struk_po($id){
		$data['po'] = $this->Amcloth->get_po_by_id($id);
		$this->load->view('struk_po',$data);
	}

	public function checkout(){
		$data2['id_store'] = $this->session->userdata('id_store');
		$data2['bayar'] = $this->input->post('bayar');
		$data2['total'] = $this->cart->total();
		$this->Amcloth->save('tb_struk',$data2);
		$id_struk = $this->Amcloth->get_id_struk();
		foreach ($this->cart->contents() as $items) {
			$data['id_stock'] = $this->Amcloth->get_id_stock($items['id'])->id_stock;
			$data['jumlah'] = $items['qty'];

			$data['id_struk'] = $id_struk->id_struk;
			$this->Amcloth->save('tb_transaksi',$data);
			$this->Amcloth->update_stock($data['id_stock'],$items['qty']);
			// echo json_encode($data);
		}

		$data2['cart'] = $this->cart->contents();

		$this->cart->destroy();
		$this->load->view('struk',$data2);
		// echo json_encode($data2);

		

	}

	public function kategori()
	{
		$data2['kategori']=$this->Amcloth->get_kategori();
		$data['content']=$this->load->view('pages/Karyawan/kategori',$data2,true);
		$this->load->view('default_karyawan',$data);
	}

	public function tambah_kategori()
	{
		$data['nama_kategori']=$_POST['nama'];
		$this->Amcloth->save_kategori($data);
		redirect('Karyawan/kategori');
	}

	public function update_kategori()
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$this->Amcloth->update_kategori($id,$nama);
		redirect('Karyawan/kategori');
	}

	public function edit_kategori($id)
	{
		$data2['kategori']=$this->Amcloth->edit_kategori($id);
		$data['content']=$this->load->view('pages/Karyawan/edit_kategori',$data2,true);
		$this->load->view('default_karyawan',$data);

		// echo json_encode($data2);
	}
	public function delete_kategori($id)
	{
		$this->Amcloth->delete_kategori($id);
		redirect('karyawan/kategori');
	}

	
	public function save_stock()
	{
		$id = $this->session->userdata('id_store');
		$kode_barang= $_POST['barang'];
		$data['kode_barang']=$kode_barang;
		$data['jumlah']=$_POST['jumlah'];
		$data['id_store']=$_POST['id'];
		$store = $_POST['store'];

		
		
		if ($store > 0	) {
			$ambil = $_POST['jumlah'];
			$get_stock_lain = $this->Amcloth->get_stock_jumlah_barang($store,$data['kode_barang'],$ambil);
			
			if ($get_stock_lain=='') {
				$this->session->set_flashdata('msg','Stock Tidak Ada');
				// echo "gada stok";
			}else{
				echo json_encode($get_stock_lain);
				$jumlah = intval($get_stock_lain->jumlah) - intval($ambil);
				// echo json_encode($jumlah);
				
				$this->Amcloth->update_jumlah_stock($get_stock_lain->kode_barang,$get_stock_lain->id_store,$jumlah);

				$get_stock = $this->Amcloth->get_stock_barang($id,$data['kode_barang']);
				if (!empty($get_stock)) {
					$this->Amcloth->ambil_stock($get_stock->id_stock,$data['jumlah']);
					$this->session->set_flashdata('msg','Anda telah menambahkan stock');
					// echo "ambil stock dari store";
				}else{
					$this->Amcloth->save_stock($data);
					// echo "nambah stock dari store lain";
					$this->session->set_flashdata('msg','Anda telah menambahkan stock');
				}
				

			}

			// $jumlah =$this->Amcloth->get_jumlah_stock($kode_barang,$store);

			
		} else{
			$get_stock = $this->Amcloth->get_stock_barang($id,$data['kode_barang']);
			if (!empty($get_stock)) {
			// echo $get_stock->id_stock;
				$this->Amcloth->ambil_stock($get_stock->id_stock,$data['jumlah']);
				// echo "nambah stock dari pusat";
				$this->session->set_flashdata('msg','anda telah mengambil stock dari pusat');
			}else{
			// echo "gagal";
				$this->Amcloth->save_stock($data);
				// echo "ambil data dari pusat";
				$this->session->set_flashdata('msg','anda telah menambahkan stock dari pusat');
			}	
		}

		
		



		redirect('karyawan/stock');
	}

	public function save_po()
	{
		$data['id_store'] = $this->session->userdata('id_store');
		$data['nama_pemesan']=$this->input->post('pemesan');
		$data['no_hp']=$this->input->post('no_hp');
		$data['keterangan']=$this->input->post('keterangan');
		$data['dp']=$this->input->post('dp');
		$data['total']=$this->input->post('total');
		$data['deleted']='';
		$this->Amcloth->save_po($data);
		redirect('karyawan/po');
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
