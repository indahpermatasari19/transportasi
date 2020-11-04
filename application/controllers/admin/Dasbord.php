<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbord extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('datapeminjaman_model');
	}

	public function index()
	{
		$jumlahPending = $this->datapeminjaman_model->countPending();
		$jumlahConfirm = $this->datapeminjaman_model->countConfirm();
		$jumlahCancel = $this->datapeminjaman_model->countCancel();
		$data = array( 'title' => 'Halaman Administrator',
						'isi'  => 'admin/dasbord/list',
						'pending' => $jumlahPending,
						'confirm' => $jumlahConfirm,
						'cancel' => $jumlahCancel
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbord.php */
/* Location: ./application/controllers/admin/Dasbord.php */