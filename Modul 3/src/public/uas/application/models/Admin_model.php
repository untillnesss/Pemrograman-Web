<?php
class Admin_model extends CI_Model
{
	function fetch_kamar()
	{
		$query = $this->db->query("SELECT * FROM kamar");

		return $query;
	}

	function countKamar()
	{
		$query = $this->db->query("SELECT COUNT(*) as count FROM kamar")->row()->count;

		return $query;
	}


	function all_fasilitas()
	{
		$query = $this->db->query("SELECT * FROM fasilitas a ORDER BY a.id DESC")->result_array();

		return $query;
	}

	function fetch_kamar_perpage($limit, $start)
	{
		// $this->db->get('t_penduduk', $limit, $start);
		// $query = 
		// return $query;
		$query = $this->db->query(
			"	SELECT * 
				FROM kamar a 
				ORDER BY a.idkamar DESC"
		)->result_array();

		return $query;
	}

	function kamar_fasilitas($kamarId)
	{
		$query = $this->db->query(
			"	SELECT kamar_fasilitas.*, fasilitas.name
				FROM kamar_fasilitas
				INNER JOIN fasilitas
				ON fasilitas.id = kamar_fasilitas.fasilitas_id
				WHERE kamar_fasilitas.kamar_id = " . $kamarId . "
				ORDER BY id DESC"
		)->result_array();

		return $query;
	}

	function fetch_fasilitas_perpage($limit, $start)
	{
		$query = $this->db->query("SELECT * FROM fasilitas a ORDER BY a.id DESC")->result_array();

		return $query;
	}

	public function search($keyword)
	{
		$columns = [
			'tipe',
			'jumlah',
			'harga',
		];

		foreach ($columns as $colum) {
			$this->db->or_like($colum, $keyword);
		}

		$query = $this->db->get('kamar');
		return $query->result_array();
	}


	public function search_fasilitas($keyword)
	{
		$columns = [
			'name',
		];

		foreach ($columns as $colum) {
			$this->db->or_like($colum, $keyword);
		}

		$query = $this->db->get('fasilitas');
		return $query->result_array();
	}

	function fetch_fasilitas_single($id)
	{
		$query = $this->db->query("SELECT * FROM fasilitas WHERE id = " . $id);

		return $query;
	}

	function fetch_kamar_single($id)
	{
		$query = $this->db->query(
			"SELECT * FROM kamar WHERE idkamar = " . $id
		);

		return $query;
	}

	function insert_fasilitas($data)
	{
		$this->db->insert('fasilitas', $data);
	}

	function insert_kamar($data, $fasilitas)
	{
		$this->db->insert('kamar', $data);
		$kamarId = $this->db->insert_id();

		foreach ($fasilitas as $fasilita) {
			$this->db->insert('kamar_fasilitas', [
				'kamar_id' => $kamarId,
				'fasilitas_id' => $fasilita,
			]);
		}
	}

	function kamarid_ai()
	{
		$query = $this->db->query("SELECT (MAX(idkamar) + 1) as kamarid_ai FROM kamar");

		return $query;
	}

	function update_kamar($data, $fasilitas)
	{
		$kamarId = $data['idkamar'];

		$this->db->where('idkamar', $kamarId);
		$this->db->update('kamar', $data);

		$this->delete_fasilitas_by_kamar($kamarId);

		foreach ($fasilitas as $fasilita) {
			$this->db->insert('kamar_fasilitas', [
				'kamar_id' => $kamarId,
				'fasilitas_id' => $fasilita,
			]);
		}
	}

	function update_fasilitas($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('fasilitas', $data);
	}
	function delete_kamar($id)
	{
		$this->db->where('idkamar', $id);
		$this->db->delete('kamar');
	}

	function delete_fasilitas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('fasilitas');
	}

	function delete_fasilitas_by_kamar($id)
	{
		$this->db->where('kamar_id', $id);
		$this->db->delete('kamar_fasilitas');
	}

	function fetch_tamu_perpage($limit, $start)
	{
		$query = $this
			->db
			->query("SELECT * FROM tamu a WHERE level_user != 1 ORDER BY a.idtamu DESC")
			->result_array();

		return $query;
	}

	function countTamu()
	{
		$query = $this
			->db
			->query("SELECT COUNT(*) as count FROM tamu a WHERE level_user != 1 ORDER BY a.idtamu DESC")
			->row()
			->count;

		return $query;
	}

	public function search_tamu($keyword)
	{
		$columns = [
			'username',
			'nama',
			'alamat',
			'telepon',
		];

		$query = $this
			->db
			->from('tamu')
			->where('level_user !=', 1)
			->group_start();

		foreach ($columns as $colum) {
			$query->or_like($colum, $keyword);
		}

		return $query
			->group_end()
			->get()
			->result_array();
	}

	function fetch_pemesanan_perpage($limit, $start)
	{
		$query = $this
			->db
			->query("	SELECT a.*, b.*, c.jumlah_bayaran, c.bank, c.norek, c.namarek, c.bukti_pembayaran 
						FROM pemesanan a 
						LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
						LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
						ORDER BY a.idpesan DESC
					")
			->result_array();

		return $query;
	}

	function countPesanan()
	{
		$query = $this
			->db
			->query("	SELECT COUNT(*) as count
						FROM pemesanan a 
						LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
						LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
						ORDER BY a.idpesan DESC
					")
			->row()
			->count;

		return $query;
	}

	function sumPesanan()
	{
		$query = $this
			->db
			->query("	SELECT SUM(a.totalbayar) as count
						FROM pemesanan a 
						LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
						LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
						WHERE a.status = 'Berhasil'
						ORDER BY a.idpesan DESC
					")
			->row()
			->count;

		return $query;
	}

	function fetch_pemesanan_perpage_search($keyword)
	{
		$query = $this
			->db
			->query("	SELECT a.*, b.*, c.jumlah_bayaran, c.bank, c.norek, c.namarek, c.bukti_pembayaran 
						FROM pemesanan a 
						LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
						LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
						ORDER BY a.idpesan DESC
					");

		$columns = [
			'username',
			'nama',
			'alamat',
			'telepon',
		];

		foreach ($columns as $colum) {
			$query->or_like($colum, $keyword);
		}

		return $query
			->get()
			->result_array();
	}

	function update_pemesanan_status($data)
	{
		$this->db->where('idpesan', $data['idpesan']);
		$this->db->update('pemesanan', $data);
	}
}
