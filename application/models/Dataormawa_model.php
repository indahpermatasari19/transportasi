<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataormawa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_ormawa');
		$this->db->join('t_user', 't_ormawa.id_user = t_user.id_user');
		$this->db->order_by('id_ormawa', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_ormawa)
	{
		$this->db->select('*');
		$this->db->from('t_ormawa');
		$this->db->join('t_user', 't_ormawa.id_user = t_user.id_user');
		$this->db->where('id_ormawa', $id_ormawa);
		$this->db->order_by('id_ormawa', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getIdUserbyId($id){
		$this->db->select('id_user');
		$this->db->from('t_ormawa');
		$this->db->where('id_ormawa', $id);
		$this->db->order_by('id_ormawa', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_ormawa', $data);
	}

	// Edit
	public function edit($dataormawa,$datauser)
	{
		$this->db->where('id_ormawa', $dataormawa['id_ormawa']);
		$this->db->update('t_ormawa',$dataormawa);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->update('t_user',$datauser);
	}

	

	// Delete
	public function delete($data,$datauser)
	{
		$this->db->where('id_ormawa', $data['id_ormawa']);
		$this->db->delete('t_ormawa',$data);
		$this->db->where('id_user', $datauser->id_user);
		$this->db->delete('t_user');
	}

}

/* End of file Dataormawa_model.php */
/* Location: ./application/models/Dataunit_model.php */