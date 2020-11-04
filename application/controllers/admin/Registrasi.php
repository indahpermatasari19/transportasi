<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('registrasi_model');
			$this->load->model('level_model');
			$this->load->model('dataormawa_model');
			$this->load->model('dataumum_model');
			$this->load->model('dataunit_model');
			$this->load->model('datajurusan_model');
			$this->load->model('datasopir_model');
				
		}

		// Data Registrasi
		// public function index()
		// {
		// 	$Registrasi = $this->registrasi_model->listing();

		// 	$data = array( 'title'  => 'Data Registrasi',
		// 					'Registrasi' => $Registrasi,
		// 					'isi' => 'admin/Registrasi/list'
		// 				);
		// 	$this->load->view('admin/layout/wrapper', $data, FALSE);
		// }

		// Tambah Data Registrasi
		public function index()
		{
			$valid = $this->form_validation;

			$valid->set_rules('nama','nama','required',
				array( 'required' => '% harus diisi')
				);

			$valid->set_rules('username','Username',
				'required|min_length[6]|max_length[32]|is_unique[t_user.username]',
				array( 'required' => '% harus diisi')
				);

			if($valid->run()===FALSE) {
				// End validasi

			$data["level"] = $this->level_model->listing();
			$data = array( 'title'  => 'Tambah Data Registrasi',
							'isi' => 'admin/Registrasi/tambah',
							'level' => $data
						);
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// Masuk database
		}else{
			$i = $this->input;
			$data = array( 'nama'=> $i->post('nama'),
                           'username'=> $i->post('username'),
                           'password'=> SHA1($i->post('password')),
                           'level' => $i->post('level'),
                           'kontak' => $i->post('kontak')
				);


			$this->registrasi_model->tambah($data);
			$id = $this->registrasi_model->getId();
			
			if($i->post('level') == '2'){
				$data = array ( 'id_user' => $id[0]->id_user
				);
				$this->dataormawa_model->tambah($data);
				redirect(base_url('admin/dataormawa'),'refresh');

			} else if ($i->post('level') == '1'){
				$data = array ( 'id_user' => $id[0]->id_user
				);
				$this->dataumum_model->tambah($data);
				redirect(base_url('admin/dataumum'),'refresh');
			} else if ($i->post('level') == '3'){
				$data = array ( 'id_user' => $id[0]->id_user
				);
				$this->datajurusan_model->tambah($data);
				redirect(base_url('admin/datajurusan'),'refresh');

			} else if ($i->post('level') == '4'){
				$data = array ( 'id_user' => $id[0]->id_user
				);
				$this->dataunit_model->tambah($data);
				redirect(base_url('admin/dataunit'),'refresh');

			} else if($i->post('level') == '5'){
				$data = array ('id_user' => $id[0]->id_user,
					'status' => 'enable');
				$this->datasopir_model->tambah($data);
				redirect(base_url('admin/datasopir'),'refresh');
			}
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/Registrasi'),'refresh');
		}
		// End masuk database
	}


}


/* End of file Registrasi.php */
/* Location: ./application/controllers/admin/Registrasi.php */