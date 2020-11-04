<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajurusan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_jurusan');
		$this->db->join('t_user', 't_jurusan.id_user = t_user.id_user');
		$this->db->order_by('id_jurusan', 'desc');
		$query = $this->db->get();
		return $query->result();

	}

	// Detail 
	public function detail($id_jurusan)
	{
		$this->db->select('*');
		$this->db->from('t_jurusan');
		$this->db->join('t_user', 't_jurusan.id_user = t_user.id_user');
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->order_by('id_jurusan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getIdUserbyId($id){
		$this->db->select('id_user');
		$this->db->from('t_jurusan');
		$this->db->where('id_jurusan', $id);
		$this->db->order_by('id_jurusan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_jurusan', $data);
	}

	// Edit
	public function edit($data,$datauser)
	{
		$this->db->where('id_jurusan', $data['id_jurusan']);
		$this->db->update('t_jurusan',$data);

		$this->db->where('id_user', $datauser['id_user']);
		$this->db->update('t_user',$datauser);
	}

	

	// Delete
	public function delete($data,$datauser)
	{
		$this->db->where('id_jurusan', $data['id_jurusan']);
		$this->db->delete('t_jurusan',$data);
		$this->db->where('id_user', $datauser->id_user);
		$this->db->delete('t_user');
        
	
	}

}

/* End of file Datajurusan_model.php */
/* Location: ./application/models/Dataunit_model.php */