<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataumum extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('dataumum_model');
		}

		// Data Sopir
		public function index()
		{
			$dataumum = $this->dataumum_model->listing();

			$data = array( 'title'  => 'Data Umum',
							'dataumum' => $dataumum,
							'isi' => 'admin/dataumum/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		

	// Edit Data Sopir
	public function edit($id_umum)
    {   
        $dataumum = $this->dataumum_model->detail($id_umum);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama','nama  ','required',
            array('required' => '%s harus diisi'
            ));



        if($valid->run()==FALSE){
        //End Validasi
        $data = array('title'   => 'Edit dataumum',
                      'dataumum' => $dataumum,
                      'isi'     => 'admin/dataumum/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $data = array(   'id_umum'=> $i->post('id_umum'),
                            'kelas'=> $i->post('kelas'),
                            );
            $datauser = array( 'id_user' => $i->post('id_user'),
                            'nama'=> $i->post('nama'),
                            'kontak'=> $i->post('kontak'),
            					);
            
            $this->dataumum_model->edit($data,$datauser);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/dataumum'),'refresh');
        }
        //End masuk database
    }
		

	// Delete Data Sopir
	public function delete($id_umum)
	{
			$data = array('id_umum' => $id_umum);
			$datauser = $this->dataumum_model->getIdUserbyId($id_umum);
			
			$this->dataumum_model->delete($data,$datauser);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/dataumum'),'refresh');
	}


}


/* End of file Dataumum.php */
/* Location: ./application/controllers/admin/Dataumum.php */