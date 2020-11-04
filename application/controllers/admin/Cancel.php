<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancel extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datapeminjaman_model');
			$this->load->model('datasopir_model');
			
		}

		// Data Sopir
		public function index()
		{
			$datapeminjaman = $this->datapeminjaman_model->listingCancel();

			foreach ($datapeminjaman as $peminjaman => $key){
			
				if($key->id_sopir != 0){
					$sopir = $this->datasopir_model->detail($key->id_sopir);
					$key->nama_sopir = $sopir->nama;
				}
				// var_dump($datapeminjaman);

			}

			$data = array( 'title'  => 'Data Peminjaman',
							'cancel' => $datapeminjaman,
							'isi' => 'admin/cancel/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		
		// Delete Data Sopir
	public function delete($kode_booking)
	{
			$data = array('kode_booking' => $kode_booking);
			$this->datapeminjaman_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/cancel'),'refresh');
	}
	
	public function editStatus($kode,$status){
		$data = $this->datapeminjaman_model->getKode($kode);
		$data->status = $status;
		$this->datapeminjaman_model->updateStatus($data);
		if($status == 'cancel'){
			$databooking = $this->datapeminjaman_model->getKodeWithAllData($kode);
			$status = 'enable';
	        $datasopir = array(   
	        				'id_sopir' => $databooking->id_sopir,
	        				'status'=> $status
	                        );
	        $datakendaraan = array(   
	        				'kode_kendaraan' => $databooking->kode_kendaraan,
	        				'status'=> $status
	                        );
	        
	        $this->datapeminjaman_model->updateCancel($datasopir,$datakendaraan);
	    }
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/cancel'),'refresh');

	}


}


/* End of file Cancel.php */
/* Location: ./application/controllers/admin/Cancel.php */