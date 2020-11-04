<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasopir_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_sopir');
		$this->db->join('t_user', 't_sopir.id_user = t_user.id_user');
		$this->db->order_by('id_sopir', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	public function sopirEnable()
	{
		$this->db->select('*');
		$this->db->from('t_sopir');
		$this->db->join('t_user', 't_sopir.id_user = t_user.id_user');
		$this->db->where('status', 'enable');
		$this->db->order_by('id_sopir', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_sopir)
	{
		$this->db->select('*');
		$this->db->from('t_sopir');
		$this->db->join('t_user', 't_sopir.id_user = t_user.id_user');
		$this->db->where('id_sopir', $id_sopir);
		$this->db->order_by('id_sopir', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_sopir', $data);
	}

	// Edit
	public function edit($data, $datauser)
	{
		$this->db->where('id_sopir', $data['id_sopir']);
		$this->db->update('t_sopir',$data);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->update('t_user',$datauser);

	}

	public function updateStatus($id_sopir, $data)
	{
		$this->db->where('id_sopir', $id_sopir);
		$this->db->update('t_sopir',$data);
	}

	

	// Delete
	public function delete($data,$datauser)
	{
		$this->db->where('id_sopir', $data['id_sopir']);
		$this->db->delete('t_sopir',$data);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->delete('t_user',$datauser);
	}

}

/* End of file Datasopir_model.php */
/* Location: ./application/models/Datasopir_model.php */