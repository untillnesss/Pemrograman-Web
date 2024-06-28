<?php
class Login_model extends CI_Model
{
	function fetch_user($data)
	{
		$query = $this->db->query("SELECT * FROM tamu WHERE username = '" . $data['username'] . "' AND password= '" . $data['password'] . "';");

		return $query;
	}

	function hasUser($data)
	{
		$query = $this
			->db
			->query("SELECT * FROM tamu WHERE username = '" . $data . "';")
			->row();

		return $query;
	}

	function insert_tamu($data)
	{
		$this->db->insert('tamu', $data);
		return $this->db->insert_id();
	}
}
