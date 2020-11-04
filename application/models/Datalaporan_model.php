<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalaporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all datasopir
	public function listing($tahun, $bulan)
	{
		$sql = "SELECT b.kode_booking, k.nomor_polisi, u.nama, b.tanggal_peminjaman, b.status   FROM `t_booking` b, t_user u, t_kendaraan k WHERE b.kode_kendaraan = k.kode_kendaraan AND u.id_user = b.id_user AND YEAR(b.tanggal_peminjaman) =  ? AND MONTH(b.tanggal_peminjaman) = ?";
		$query = $this->db->query($sql, array($tahun, $bulan));
        return $query->result();
	}

}

/* End of file Datajurusan_model.php */
/* Location: ./application/models/Dataunit_model.php */