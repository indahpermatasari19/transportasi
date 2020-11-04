<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataumum_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_umum');
		$this->db->join('t_user', 't_umum.id_user = t_user.id_user');
		$this->db->order_by('id_umum', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_umum)
	{
		$this->db->select('*');
		$this->db->from('t_umum');
		$this->db->where('id_umum', $id_umum);
		$this->db->join('t_user', 't_umum.id_user = t_user.id_user');
		$this->db->order_by('id_umum', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getIdUserbyId($id){
		$this->db->select('id_user');
		$this->db->from('t_umum');
		$this->db->where('id_umum', $id);
		$this->db->order_by('id_umum', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_umum', $data);
	}

	// Edit
	public function edit($data,$datauser)
	{
		$this->db->where('id_umum', $data['id_umum']);
		$this->db->update('t_umum',$data);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->update('t_user',$datauser);
	}

	

	// Delete
	public function delete($data,$datauser)
	{
		$this->db->where('id_umum', $data['id_umum']);
		$this->db->delete('t_umum',$data);

		$this->db->where('id_user', $datauser->id_user);
		$this->db->delete('t_user');
	}

}

/* End of file Dataumum_model.php */
/* Location: ./application/models/Dataumum_model.php */