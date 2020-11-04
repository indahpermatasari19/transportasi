<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataunit_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_unit');
		$this->db->join('t_user', 't_unit.id_user = t_user.id_user');
		$this->db->order_by('id_unit', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_unit)
	{
		$this->db->select('*');
		$this->db->from('t_unit');
		$this->db->join('t_user', 't_unit.id_user = t_user.id_user');
		$this->db->where('id_unit', $id_unit);
		$this->db->order_by('id_unit', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	public function getIdUserbyId($id){
		$this->db->select('id_user');
		$this->db->from('t_unit');
		$this->db->where('id_unit', $id);
		$this->db->order_by('id_unit', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_unit', $data);
	}

	// Edit
	public function edit($dataunit,$datauser)
	{
		$this->db->where('id_unit', $dataunit['id_unit']);
		$this->db->update('t_unit',$dataunit);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->update('t_user',$datauser);
	}

	

	// Delete
	public function delete($data,$datauser)
	{
		// var_dump($datauser->id_user);

		$this->db->where('id_unit', $data['id_unit']);
		$this->db->delete('t_unit',$data);

		$this->db->where('id_user', $datauser->id_user);
		$this->db->delete('t_user');
		// die();
	}

}

/* End of file Dataunit_model.php */
/* Location: ./application/models/Dataunit_model.php */