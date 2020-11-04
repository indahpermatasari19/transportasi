<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all 
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_level');
		$this->db->order_by('id_level', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
}

/* End of file Registrasi_model.php */
/* Location: ./application/models/Registrasi_model.php */