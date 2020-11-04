<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all 
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('t_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getId(){
		$this->db->select('id_user,nama');
		$this->db->from('t_user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_user', $data);
	}

}

/* End of file Registrasi_model.php */
/* Location: ./application/models/Registrasi_model.php */