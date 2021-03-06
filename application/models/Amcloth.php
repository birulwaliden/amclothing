<?php 
if (!defined('BASEPATH'))exit ('No direct script access allowed');

class Amcloth extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function cek_login($data){
		$this->db->select('tb_store.*');
		$this->db->from('tb_store');
		$this->db->where($data);
		$query=$this->db->get();
		return $query->row();

	}
	function cek_login_karyawan($data){
		$this->db->select('tb_store.id_store,
			tb_store.nama_store,
			tb_karyawan.nama_karyawan,
			tb_store.no_hp,
			tb_karyawan.username,
			tb_store.alamat');
		$this->db->join('tb_store','tb_store.id_store = tb_karyawan.id_store');
		$this->db->from('tb_karyawan');
		$this->db->where($data);
		$query=$this->db->get();
		return $query->row();

	}

	function reset_pass($id){
		$username = $this->get_karyawan_by_id($id)->username;
		$this->db->set('password',md5($username));
		$this->db->where('id_karyawan',$id);
		$this->db->update('tb_karyawan');
	}

	function get_barang(){
		$this->db->select('tb_barang.*,tb_kategori.nama_kategori');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori','tb_barang.id_kategori=tb_kategori.id_kategori');
		$this->db->where('tb_barang.deleted','0');
		$query=$this->db->get();
		return $query->result();

	}

	function get_kategori(){
		$this->db->select('tb_kategori.*');
		$this->db->from('tb_kategori');
		$this->db->where('deleted','0');
		$query=$this->db->get();
		return$query->result();
	}

	function cek_username($username){
		$this->db->where('username',$username);
		$query=$this->db->get('tb_karyawan');
		$result =  $query->num_rows();

		if ($result > 0) {
			return $result;
		}else{
			$this->db->where('username',$username);
			$query=$this->db->get('tb_store');
			$result =  $query->num_rows();
			return $result;
		}
	}

	function cek_hp($hp){
		$this->db->where('no_hp',$hp);
		$query=$this->db->get('tb_karyawan');
		$result =  $query->num_rows();

		if ($result > 0) {
			return $result;
		}else{
			$this->db->where('no_hp',$hp);
			$query=$this->db->get('tb_store');
			$result =  $query->num_rows();
			return $result;
		}
	}





	function get_store(){
		$this->db->select('tb_store.*');
		$this->db->from('tb_store');
		$this->db->where('deleted','0');
		$this->db->where('JenisUser','0');
		$query=$this->db->get();
		return$query->result();
	}

	function get_karyawan(){
		$this->db->select('tb_karyawan.*,tb_store.nama_store');
		$this->db->join('tb_store','tb_store.id_store = tb_karyawan.id_store');
		$this->db->from('tb_karyawan');
		$this->db->where('tb_karyawan.deleted','0');
		$this->db->where('tb_store.deleted','0');
		$query=$this->db->get();
		return$query->result();
	}

	function get_karyawan_by_id($id){
		$this->db->where('id_karyawan',$id);
		$query=$this->db->get('tb_karyawan');
		return$query->row();
	}



	function save_kategori($data){
		$this->db->insert('tb_kategori',$data);
	}

	function save_karyawan($data){
		$this->db->insert('tb_karyawan',$data);
	}
	function save_po($data){
		$this->db->insert('tb_po',$data);
	}

	function save_store($data){
		$this->db->insert('tb_store',$data);
	}

	function save_barang($data){
		$this->db->insert('tb_barang',$data);
	}

	function get_id_struk(){
		$this->db->order_by('id_struk','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_struk');
		return $query->row();
	}

	function save($table,$data){
		$this->db->insert($table,$data);
	}

	function delete_kategori($id){
		$this->db->set('deleted','1');
		$this->db->where('id_kategori',$id);
		$this->db->update('tb_kategori');
	}

	function delete_store($id){
		$this->db->set('deleted','1');
		$this->db->where('id_store',$id);
		$this->db->update('tb_store');
	}

	function delete_karyawan($id){
		$this->db->set('deleted','1');
		$this->db->where('id_karyawan',$id);
		$this->db->update('tb_karyawan');
	}

	function edit_kategori($id){
		$this->db->select('tb_kategori.*');
		$this->db->from('tb_kategori');
		$this->db->where('id_kategori',$id);
		$query=$this->db->get();
		return $query->row();
	}

	function update_kategori($id,$nama){
		$this->db->set('nama_kategori',$nama);
		$this->db->where('id_kategori',$id);
		$this->db->update('tb_kategori');
	}

	function update_store($id,$data){
		$this->db->set($data);
		$this->db->where('id_store',$id);
		$this->db->update('tb_store');
	}
	function update_karyawan($id,$data){
		$this->db->set($data);
		$this->db->where('id_karyawan',$id);
		$this->db->update('tb_karyawan');
	}

	function hapus_barang($id){
		$this->db->set('deleted','1');
		$this->db->where('kode_barang',$id);
		$this->db->update('tb_barang');
	}

	function edit_barang($kode){
		$this->db->select('tb_barang.*,tb_kategori.nama_kategori');
		$this->db->from('tb_barang');
		$this->db->join('tb_kategori','tb_barang.id_kategori=tb_kategori.id_kategori');
		$this->db->where('tb_barang.deleted','0');
		$this->db->where('tb_barang.kode_barang',$kode);
		$query=$this->db->get();
		return $query->row();
	}

	function update_barang($data,$kode){
		$this->db->set($data);
		$this->db->where('kode_barang',$kode);
		$this->db->update('tb_barang');

	}

	function get_stock($id){
		$this->db->where('id_store',$id);
		$this->db->join('tb_barang','tb_stock.kode_barang = tb_barang.kode_barang');
		$query=$this->db->get('tb_stock');
		return $query->result();
	}

	function get_stock_all(){
		$this->db->join('tb_store','tb_stock.id_store = tb_store.id_store');
		$this->db->join('tb_barang','tb_stock.kode_barang = tb_barang.kode_barang');
		$this->db->where('tb_stock.deleted','0');
		$query=$this->db->get('tb_stock');
		return $query->result();
	}

	function get_store_list($id){
		$this->db->where_not_in('id_store',$id);
		$this->db->where('JenisUser','0');
		$this->db->where('deleted','0');
		$query=$this->db->get('tb_store');
		return $query->result();
	}
	function get_po($id){
		$this->db->where('id_store',$id);
		$query=$this->db->get('tb_po');
		return $query->result();
	}

	function get_po_by_id($id){
		$this->db->where('id_po',$id);
		$query=$this->db->get('tb_po');
		return $query->row();
	}

	function get_history($id){
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	
	function get_history_tanggal($id,$mulai,$sampai){
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->where('date(tb_transaksi.tgl_transaksi) >= ',$mulai);
		$this->db->where('date(tb_transaksi.tgl_transaksi) <= ',$sampai);
		$this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_history_admin($id,$tanggal){
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->where('tb_struk.id_store',$id);
		$this->db->where('date(tb_transaksi.tgl_transaksi)',$tanggal);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_history_all(){
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		// $this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_struk($id){
		$this->db->select('tb_stock.kode_barang , tb_transaksi.jumlah');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->where('tb_struk.id_struk',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_stockout($id){
		// $this->db->select('sum(tb_transaksi.jumlah) as stockout,tb_stock.kode_barang');
		// $this->db->select('tb_transaksi.*');
		$this->db->from('tb_stock');
		$this->db->join('tb_transaksi','tb_stock.id_stock = tb_transaksi.id_stock' ,'right');
		$this->db->join('tb_struk','tb_struk.id_struk = tb_transaksi.id_struk');
		// $this->db->where('tb_struk.id_struk',$id);
		// $this->db->where('tb_struk.id_store',$id);
		$this->db->where('tb_stock.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get();
		// return $query->row();
		return $query->result();
	}

	function get_stockout_id($id,$kode){
		$this->db->select('sum(tb_transaksi.jumlah) as stockout,tb_stock.kode_barang');
		// $this->db->select('sum(tb_transaksi.jumlah) as stockout,tb_stock.kode_barang');
		// $this->db->select('tb_transaksi.*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->join('tb_struk','tb_struk.id_struk = tb_transaksi.id_struk');
		// $this->db->where('tb_struk.id_struk',$id);
		// $this->db->where('tb_struk.id_store',$id);
		$this->db->where('tb_stock.kode_barang',$kode);
		$this->db->where('tb_stock.id_store',$id);
		$this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get();
		// return $query->row();
		// return $query->result();
		return $query->row();
	}

	function get_history_store($id){
		$this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_grap($id){
		$this->db->select('sum(tb_struk.total) as pendapatan, DATE_FORMAT(tb_transaksi.tgl_transaksi, "%d") as tanggal,tb_struk.id_store');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->where('tb_struk.id_store',$id);
		$this->db->where('MONTH(tb_transaksi.tgl_transaksi)',date('m'));
		$this->db->group_by('date(tb_transaksi.tgl_transaksi)');
		$this->db->order_by('date(tb_transaksi.tgl_transaksi)','ASC');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_penjualan_bulan($id){
		$this->db->select('sum(tb_struk.total) as pendapatan');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->where('tb_struk.id_store',$id);
		$this->db->where('MONTH(tb_transaksi.tgl_transaksi)',date('m'));
		$this->db->group_by('MONTH(tb_transaksi.tgl_transaksi)');
		$query = $this->db->get('tb_struk');

		return $query->row();
	}


	function get_penjualan_bulan_all(){
		$this->db->select('sum(tb_struk.total) as pendapatan');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		// $this->db->where('tb_struk.id_store',$id);
		// $this->db->where('MONTH(tb_transaksi.tgl_transaksi)',date('m'));
		$this->db->group_by('MONTH(tb_transaksi.tgl_transaksi)');
		$query = $this->db->get('tb_struk');

		return $query->row();
	}



	function get_laporan_penjualan(){
		$this->db->select('sum(tb_struk.total) as pendapatan, DATE_FORMAT(tb_transaksi.tgl_transaksi, "%d %M %Y") as tanggal,tb_struk.id_store,tb_store.nama_store, date(tb_transaksi.tgl_transaksi) as tgl');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_store','tb_store.id_store = tb_struk.id_store');
		// $this->db->where('tb_struk.id_store',$id);
		$this->db->group_by('date(tb_transaksi.tgl_transaksi)');
		$this->db->order_by('date(tb_transaksi.tgl_transaksi)','DESC');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_penjualan_by_store($id){
		$this->db->select('sum(tb_struk.total) as pendapatan, DATE_FORMAT(tb_transaksi.tgl_transaksi, "%m") as bulan,tb_struk.id_store');
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->where('tb_struk.id_store',$id);
		$this->db->group_by('MONTH(tb_transaksi.tgl_transaksi)');
		$this->db->order_by('MONTH(tb_transaksi.tgl_transaksi)','ASC');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}


	function get_terbanyak($id){
		$this->db->select('sum(tb_transaksi.jumlah) as banyak, tb_stock.kode_barang,tb_barang.nama_barang,tb_store.nama_store ');
		$this->db->join('tb_stock','tb_transaksi.id_stock = tb_stock.id_stock');
		$this->db->join('tb_store','tb_stock.id_store = tb_store.id_store');
		$this->db->join('tb_barang','tb_stock.kode_barang = tb_barang.kode_barang');
		// $this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_transaksi.id_stock');
		// $this->db->group_by('tb_stock.id_stock');
		$this->db->group_by('tb_stock.id_store');
		$this->db->order_by('banyak','desc');
		// $this->db->limit(5);
		$query = $this->db->get('tb_transaksi');

		return $query->result();
	}


	function get_stock_now($id){
		$this->db->join('tb_transaksi','tb_transaksi.id_struk = tb_struk.id_struk');
		$this->db->join('tb_stock','tb_stock.id_stock = tb_transaksi.id_stock');
		$this->db->where('tb_struk.id_store',$id);
		// $this->db->group_by('tb_stock.kode_barang');
		$query = $this->db->get('tb_struk');

		return $query->result();
	}

	function get_stock_barang($id,$kode_barang){
		$this->db->where('id_store',$id);
		$this->db->where('kode_barang',$kode_barang);
		$query = $this->db->get('tb_stock');
		return $query->row();
	}

	function get_stock_jumlah_barang($id,$kode_barang,$jumlah){
		$this->db->where('id_store',$id);
		$this->db->where('kode_barang',$kode_barang);
		$this->db->where('jumlah >=',$jumlah);
		$query = $this->db->get('tb_stock');
		return $query->row();
	}


	function get_stock_by_id($id_stock){
		$id_store = $this->session->userdata('id_store');
		// $id_store = '2';
		$this->db->select('tb_stock.*,tb_barang.*');
		$this->db->from('tb_stock');
		$this->db->join('tb_barang','tb_stock.kode_barang = tb_barang.kode_barang');
		$this->db->where('tb_stock.kode_barang',$id_stock);
		$this->db->where('tb_stock.id_store',$id_store);

		$query=$this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil = array(
					'id_stock' => $data->kode_barang,
					'nama_barang' => $data->nama_barang,
					'harga' => $data->harga_jual,
					'ukuran' => $data->ukuran,
					'jumlah' => $data->jumlah,
					'diskon' => $data->diskon,
				);
			}
		}
		return $hasil;

	}

	function get_id_stock($id_stock){
		$id_store = $this->session->userdata('id_store');
		// $id_store = '2';
		$this->db->select('tb_stock.*,tb_barang.*');
		$this->db->from('tb_stock');
		$this->db->join('tb_barang','tb_stock.kode_barang = tb_barang.kode_barang');
		$this->db->where('tb_stock.kode_barang',$id_stock);
		$this->db->where('tb_stock.id_store',$id_store);
		$query = $this->db->get();

		return $query->row();

	}

	function save_stock($data){
		$this->db->insert('tb_stock',$data);
	}

	function get_jumlah_stock($kode_barang,$id_store){
		$this->db->select('jumlah');
		$this->db->from('tb_stock');
		$this->db->where('kode_barang',$kode_barang);
		$this->db->where('id_store',$id_store);
		$query=$this->db->get();
		return $query->row();
	}

	function update_jumlah_stock($kode_barang,$id_store,$jumlah){
		$this->db->set('jumlah',$jumlah);
		$this->db->where('kode_barang',$kode_barang);
		$this->db->where('id_store',$id_store);
		$this->db->update('tb_stock');

	}

	function update_stock($id,$jumlah){
		$this->db->query("UPDATE tb_stock SET jumlah = jumlah-'$jumlah' WHERE id_stock = '$id' ");
	}

	function ambil_stock($id,$jumlah){
		$this->db->query("UPDATE tb_stock SET jumlah = jumlah+'$jumlah' WHERE id_stock = '$id' ");
	}
}