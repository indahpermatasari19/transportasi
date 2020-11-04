<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapeminjaman extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datapeminjaman_model');
		}

		// Data Sopir
		public function index()
		{
			$datapeminjaman = $this->datapeminjaman_model->listing();

			$data = array( 'title'  => 'Data Peminjaman',
							'datapeminjaman' => $datapeminjaman,
							'isi' => 'admin/datapeminjaman/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		
		// Delete Data Sopir
	public function delete($kode_booking)
	{
			$peminjam = $this->datapeminjaman_model->getKode($kode_booking);
			$fileImage = 'file\surat-izin\\' . $peminjam->surat_izinkegiatan;

			if(file_exists(FCPATH . $fileImage)) {
				if(!unlink($fileImage)){
					echo 'Gagal Menghapus File';
				}
			}
			
			$data = array('kode_booking' => $kode_booking);
			$this->datapeminjaman_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/datapeminjaman'),'refresh');
	}
	
	public function editStatus($kode,$status){
		$data = $this->datapeminjaman_model->getKode($kode);
		$data->status = $status;
		// var_dump($data->status);
		// die();
		$this->datapeminjaman_model->updateStatus($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/pending'),'refresh');

	}


}


/* End of file Datapeminjaman.php */
/* Location: ./application/controllers/admin/Datapeminjaman.php */