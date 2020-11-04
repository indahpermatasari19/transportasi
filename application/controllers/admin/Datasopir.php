<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasopir extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datasopir_model');
		}

		// Data Sopir
		public function index()
		{
			$datasopir = $this->datasopir_model->listing();

			$data = array( 'title'  => 'Data Sopir',
							'datasopir' => $datasopir,
							'isi' => 'admin/datasopir/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

	// Tambah Data Mobil
		public function tambah()
		{
			$valid = $this->form_validation;

			$valid->set_rules('nama_sopir','nama_sopir','required',
				array( 'required' => '% harus diisi')
				);

			if($valid->run()===FALSE) {
				// End validasi

			$data = array( 'title'  => 'Tambah Data Sopir',
							'isi' => 'admin/datasopir/tambah'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			// Masuk database
		}else{
			$i = $this->input;
			$data = array( 'id_sopir' => $i->post('id_sopir'),
						   'nama_sopir' => $i->post('nama_sopir'),
					       'kontak' => $i->post('kontak'),
                            'status' => 'enable',
				);
			$this->datasopir_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/datasopir'),'refresh');
		}
		// End masuk database
	}
		

	// Edit Data Sopir
	public function edit($id_sopir)
    {   
        $datasopir = $this->datasopir_model->detail($id_sopir);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','nama  ','required',
            array('required' => '%s harus diisi'
            ));



        if($valid->run()==FALSE){
        //End Validasi
        $data = array('title'   => 'Edit datasopir',
                      'datasopir' => $datasopir,
                      'isi'     => 'admin/datasopir/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $data = array(   'id_sopir'=> $i->post('id_sopir'),
                            );
            $datauser = array(
            				'id_user' => $i->post('id_user'),
                            'nama'=> $i->post('nama'),
                            'kontak'=> $i->post('kontak'));

            $this->datasopir_model->edit($data,$datauser);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/datasopir'),'refresh');
        }
        //End masuk database
    }
		

	// Delete Data Sopir
	public function delete($id_sopir,$id_user)
	{
			$data = array('id_sopir' => $id_sopir);
			$datauser = array('id_user' => $id_user);
			$this->datasopir_model->delete($data,$datauser);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/datasopir'),'refresh');
	}


}


/* End of file Datasopir.php */
/* Location: ./application/controllers/admin/Datasopir.php */