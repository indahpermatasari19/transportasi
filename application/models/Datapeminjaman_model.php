<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapeminjaman_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		$this->db->order_by('kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
	// listing untuk menu Home
	public function listingHome(){
	
		$this->db->select('*');
		$this->db->from('t_booking');
		// Join Tabel Kendaraan
		$this->db->join('t_kendaraan', 't_booking.kode_kendaraan = t_kendaraan.kode_kendaraan');
		// $this->db->join('t_sopir', 't_booking.nama_sopir = t_sopir.nama_sopir');
		// Join Tabel User
		$this->db->join('t_user', 't_booking.id_user = t_user.id_user');
		$this->db->where('t_booking.status', 'confirm');
		$this->db->order_by('t_booking.kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	
	}
	// Listing untuk list yang masih Pending
	public function listingPending()
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		$this->db->where('status', 'pending');
		$this->db->order_by('kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing untuk list yang sudah dikonfirmasi
	public function listingConfirm()
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		$this->db->where('status', 'confirm');
		$this->db->order_by('kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing untuk Menu Bukti
	public function listingBukti()
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		// Join Tabel Kendaraan
		$this->db->join('t_kendaraan', 't_booking.kode_kendaraan = t_kendaraan.kode_kendaraan');
		$this->db->where('t_booking.status', 'confirm');
		$this->db->order_by('t_booking.kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing untuk booking yang dicancel 
	public function listingCancel()
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		$this->db->where('status', 'cancel');
		$this->db->order_by('kode_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// Tambah
	public function tambah($data)
	{
		$this->db->insert('t_booking', $data);
	}
	
	// Get Data Booking berdasarkan Kode Booking
	public function getKode($kode)
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		$this->db->where('kode_booking', $kode);
		$query = $this->db->get();
		return $query->row_object();
	}

	// Get Data Booking berdasarkan Kode Booking dengan join tabel kendaraan dan sopir
	public function getKodeWithAllData($kode)
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		// Join Tabel Kendaraan
		$this->db->join('t_kendaraan', 't_booking.kode_kendaraan = t_kendaraan.kode_kendaraan');
		// Join Tabel Sopir
		$this->db->join('t_sopir', 't_booking.id_sopir = t_sopir.id_sopir');
		$this->db->where('kode_booking', $kode);
		$query = $this->db->get();
		return $query->row_object();
	}
	// untuk mendapatkan data kendaraan berdasarkan kode booking
	public function getBuktiKendaraan($kode)
	{
		$this->db->select('*');
		$this->db->from('t_booking');
		// Join tabel kendaraan
		$this->db->join('t_kendaraan', 't_booking.kode_kendaraan = t_kendaraan.kode_kendaraan');
		// Join Tabel User
		$this->db->join('t_user', 't_booking.id_user = t_user.id_user');
		$this->db->where('kode_booking', $kode);
		$query = $this->db->get();
		return $query->row_object();
	}		

	// Jumlah Pending
	public function countPending()
	{
		$this->db->where('status', 'pending');
		$this->db->from('t_booking');
		return $this->db->count_all_results();	
	}

	// Jumlah Confirm
	public function countConfirm()
	{
		$this->db->where('status', 'confirm');
		$this->db->from('t_booking');
		return $this->db->count_all_results();	
	}
	
	// Jumlah Cancel
	public function countCancel()
	{
		$this->db->where('status', 'cancel');
		$this->db->from('t_booking');
		return $this->db->count_all_results();	
	}

	public function updateStatus($data)
	{
		$this->db->where('kode_booking', $data->kode_booking);
		$this->db->update('t_booking',$data);	
	}
	public function updatesopir($data)
	{
		$this->db->where('kode_booking', $data->kode_booking);
		$this->db->update('t_booking',$data);	
	}

	// Update Tanggal Kembali, Status Sopir dan Status Kendaraan
	public function updateTanggalKembali($databooking, $datasopir, $datakendaraan)
	{
		// Update Tanggal Kembali
		$this->db->where('kode_booking', $databooking['kode_booking']);
		$this->db->update('t_booking',$databooking);	
		//  Update Status Sopir
		$this->db->where('id_sopir', $datasopir['id_sopir']);
		$this->db->update('t_sopir',$datasopir);
		// Update Status Kendaraan
		$this->db->where('kode_kendaraan', $datakendaraan['kode_kendaraan']);
		$this->db->update('t_kendaraan',$datakendaraan);
	}

	public function updateCancel($datasopir, $datakendaraan)
	{
		//  Update Status Sopir
		$this->db->where('id_sopir', $datasopir['id_sopir']);
		$this->db->update('t_sopir',$datasopir);
		// Update Status Kendaraan
		$this->db->where('kode_kendaraan', $datakendaraan['kode_kendaraan']);
		$this->db->update('t_kendaraan',$datakendaraan);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('kode_booking', $data['kode_booking']);
		$this->db->delete('t_booking',$data);
	}



}

/* End of file Datapeminjaman_model.php */
/* Location: ./application/models/Dataunit_model.php */