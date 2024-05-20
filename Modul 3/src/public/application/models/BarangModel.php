<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
	public function __construct()
	{
		// parent::__construct();
	}

	// Method untuk mengambil semua data barang
	public function getAll()
	{
		$query = $this->db->get('barang');
		return $query->result_array();
	}
	// Method untuk mengambil data barang sesuai pencarian
	public function search($keyword)
	{
		$columns = [
			'kode_barang',
			'nama_barang',
			'kategori_barang',
			'deskripsi_barang',
			'harga_beli',
			'harga_jual',
			'stok_barang',
			'supplier_barang',
			'tanggal_masuk',
		];

		foreach($columns as $colum){
			$this->db->or_like($colum, $keyword);
		}

		$query = $this->db->get('barang');
		return $query->result_array();
	}
}
