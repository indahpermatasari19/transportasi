<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending extends CI_Controller {

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
			$datapeminjaman = $this->datapeminjaman_model->listingPending();
			$datasopir = $this->datasopir_model->sopirEnable();
			// die();
			foreach ($datapeminjaman as $peminjaman => $key){
			
				if($key->id_sopir != 0){
					$sopir = $this->datasopir_model->detail($key->id_sopir);
					$key->nama_sopir = $sopir->nama;
				}

			}


			$data = array( 'title'  => 'Data Peminjaman',
							'pending' => $datapeminjaman,
							'datasopir' => $datasopir,
							'isi' => 'admin/pending/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		
		// Delete Data Sopir
	public function delete($kode_booking)
	{
			$data = array('kode_booking' => $kode_booking);
			$this->datapeminjaman_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/pending'),'refresh');
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
		redirect(base_url('admin/pending'),'refresh');

	}

	public function editSopir($kode,$sopir,$sopirbefore = null){
		// get peminjaman berdasarkan kode
		$data = $this->datapeminjaman_model->getKode($kode);
		// get detail sopir berdasarkan id
		$datasopir = $this->datasopir_model->detail($sopir);
		$sopirbefore = urldecode($sopirbefore);

		if($sopirbefore != null || $sopirbefore != 0){
			// men set status untuk sopir sebelumnya yang sudah dipilih
			$sopirbeforestatus = array('status' => 'enable');
			$this->datasopir_model->updateStatus($sopirbefore,$sopirbeforestatus);
		}
		
			// men set status untuk sopir yang baru dipilih
			$newstatus = array('status' => 'disable');
			$this->datasopir_model->updateStatus($datasopir->id_sopir,$newstatus);

		//mengambil nama sopir dari datasopir 
		$data->id_sopir = $datasopir->id_sopir;
		// die();
		// mengupdate nama sopir yang ada di booking tersebut
		$this->datapeminjaman_model->updateSopir($data);


		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/pending'),'refresh');



	}


}


/* End of file Pending.php */
/* Location: ./application/controllers/admin/Pending.php */