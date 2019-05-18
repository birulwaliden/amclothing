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

	function save_kategori($data){
		$this->db->insert('tb_kategori',$data);
	}

	function save_barang($data){
		$this->db->insert('tb_barang',$data);
	}

	function delete_kategori($id){
		$this->db->set('deleted','1');
		$this->db->where('id_kategori',$id);
		$this->db->update('tb_kategori');
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

	function get_stock(){
		$query=$this->db->get('tb_stock');
		return $query->result();
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
}