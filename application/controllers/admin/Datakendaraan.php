<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakendaraan extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datakendaraan_model');
		}

		// Data Mobil
		public function index()
		{
			$datamobil = $this->datakendaraan_model->listing();

			$data = array( 'title'  => 'Data Kendaraan',
							'datakendaraan' => $datamobil,
							'isi' => 'admin/datakendaraan/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		// Tambah Data Mobil
		public function tambah()
		{
			$valid = $this->form_validation;

			$valid->set_rules('jenis_kendaraan','Jenis Kendaraan','required',
				array( 'required' => '% harus diisi')
				);
			$valid->set_rules('kode_kendaraan','Kode Kendaraan','required',
				array( 'required' => '% harus diisi')
				);

			

			if($valid->run()===FALSE) {
				// End validasi

			$data = array( 'title'  => 'Tambah Data Kendaraan',
							'isi' => 'admin/datakendaraan/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// Masuk database
			}else{
				$i = $this->input;

				// setting up file
				$file = $_FILES['gambar']['name'];
				$config['file_name'] = $file;
				$config['allowed_types'] = "jpg|png|jfif|bmp|jpeg";
				$config['max_size'] = 10000;
				$config['upload_path'] = "./assets/images/kendaraan/";

				// var_dump($config);
				// die();

				// upload file
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// die();

				//jika gagal upload
				if(!$this->upload->do_upload('gambar')){

					$error = array('error' => $this->upload->display_errors());
					$data = array( 'title'  => 'Tambah Data Kendaraan',
							'isi' => 'admin/datakendaraan/tambah'
						);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else { 
					$data = array( 'kode_kendaraan' => $i->post('kode_kendaraan'),
							   'jenis_kendaraan' => $i->post('jenis_kendaraan'),
						       'nomor_polisi' => $i->post('nomor_polisi'),
						       'gambar_kendaraan' => $file,
						       'kapasitas' => $i->post('kapasitas'),
						       'warna' => $i->post('warna'),
						       'jumlah_roda' => $i->post('jumlah_roda'),
						       'peruntukkan' => $i->post('peruntukkan'),
						       'status' => 'enable'
					);
				$this->datakendaraan_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/datakendaraan'),'refresh');	
				}				
			}
		// End masuk database
	}

	// Edit Data Mobil
	public function edit($kode_kendaraan)
    {   
        $datakendaraan = $this->datakendaraan_model->detail($kode_kendaraan);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('jenis_kendaraan','Jenis Kendaraan','required',
				array( 'required' => '% harus diisi')
				);

        if($valid->run()==FALSE){
        //End Validasi
        $data = array('title'   => 'Edit datakendaraan',
                      'datakendaraan' => $datakendaraan,
                      'isi'     => 'admin/datakendaraan/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;

            // setting up file
				$file = $_FILES['gambar']['name'];
				$config['file_name'] = $file;
				$config['allowed_types'] = "jpg|png|jfif|bmp|jpeg";
				$config['max_size'] = 10000;
				$config['upload_path'] = "./assets/images/kendaraan/";

				// var_dump($config);
				// die();

				// upload file
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// die();

				//jika gagal upload
				if(!$this->upload->do_upload('gambar')){

					$error = array('error' => $this->upload->display_errors());
					$data = array( 'title'  => 'Tambah Data Kendaraan',
							'isi' => 'admin/datakendaraan/tambah'
						);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {
					$dataKendaraan = $this->datakendaraan_model->detail($kode_kendaraan);
					$filegambar = 'assets\images\kendaraan\\' . $dataKendaraan->gambar_kendaraan;

						if(file_exists(FCPATH . $filegambar)) {
							if(!unlink($filegambar)){
								echo 'Gagal Mengubah File';
							}
						}

					$data = array( 'kode_kendaraan'=> $i->post('kode_kendaraan'),
                           'jenis_kendaraan' => $i->post('jenis_kendaraan'),
					       'nomor_polisi' => $i->post('nomor_polisi'),
						   'gambar_kendaraan' => $file,
					       'kapasitas' => $i->post('kapasitas'),
					       'warna' => $i->post('warna'),
					       'jumlah_roda' => $i->post('jumlah_roda'),
					       'peruntukkan' => $i->post('peruntukkan'),
                            );

		            $this->datakendaraan_model->edit($data);
		            $this->session->set_flashdata('sukses', 'Data telah diubah');
		            redirect(base_url('admin/datakendaraan'),'refresh');
				}					
            
        }
        //End masuk database
    }
		

	// Delete Data Mobil
	public function delete($kode_kendaraan)
	{
		$dataKendaraan = $this->datakendaraan_model->detail($kode_kendaraan);
		$filegambar = 'assets\images\kendaraan\\' . $dataKendaraan->gambar_kendaraan;

			if(file_exists(FCPATH . $filegambar)) {
				if(!unlink($filegambar)){
					echo 'Gagal Menghapus File';
				}
			}

			$data = array('kode_kendaraan' => $kode_kendaraan);
			$this->datakendaraan_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/datakendaraan'),'refresh');
	}


}


/* End of file datakendaraan.php */
/* Location: ./application/controllers/admin/datakendaraan.php */