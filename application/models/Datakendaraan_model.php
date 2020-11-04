<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakendaraan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_kendaraan');
		$this->db->order_by('kode_kendaraan', 'desc');
		$query = $this->db->get();
		return $query->result();

	}



	// Detail 
	public function detail($kode_kendaraan)
	{
		$this->db->select('*');
		$this->db->from('t_kendaraan');
		$this->db->where('kode_kendaraan', $kode_kendaraan);
		$this->db->order_by('kode_kendaraan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_kendaraan', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('kode_kendaraan', $data['kode_kendaraan']);
		$this->db->update('t_kendaraan',$data);
	}

	public function updateStatus($kode_kendaraan, $data)
	{
		$this->db->where('kode_kendaraan', $kode_kendaraan);
		$this->db->update('t_kendaraan',$data);
	}

	

	// Delete
	public function delete($data)
	{
		$this->db->where('kode_kendaraan', $data['kode_kendaraan']);
		$this->db->delete('t_kendaraan',$data);
	}

}

/* End of file Datakendaraan_model.php */
/* Location: ./application/models/Datakendaraan_model.php */