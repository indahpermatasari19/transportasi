<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataunit extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('dataunit_model');
			$this->load->model('registrasi_model');
		}

		// Data Unit
		public function index()
		{
			$dataunit = $this->dataunit_model->listing();

			$data = array( 'title'  => 'Data Unit',
							'dataunit' => $dataunit,
							'isi' => 'admin/dataunit/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		
	// Edit Data Unit
	public function edit($id_unit)
    {   
        $dataunit = $this->dataunit_model->detail($id_unit);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_unit','nama_unit  ','required',
            array('required' => '%s harus diisi'
            ));



        if($valid->run()==FALSE){
        //End Validasi
        $data = array('title'   => 'Edit dataunit',
                      'dataunit' => $dataunit,
                      'isi'     => 'admin/dataunit/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $dataunit = array(   'id_unit'=> $i->post('id_unit'),
                            
                            'kepala_unit'=> $i->post('kepala_unit'),
                            'admin_unit'=> $i->post('admin_unit'),
                            );
            $datauser = array(
            				'id_user' => $i->post('id_user'),
            				'nama'=> $i->post('nama_unit'),
                            'kontak' => $i->post('kontak'),
            				);

            $this->dataunit_model->edit($dataunit,$datauser);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('admin/dataunit'),'refresh');
        }
        //End masuk database
    }
		

	// Delete Data Unit
	public function delete($id_unit)
	{
			$data = array('id_unit' => $id_unit);
			$datauser = $this->dataunit_model->getIdUserbyId($id_unit);
			// var_dump($data);
			// var_dump($datauser);
			// die();
			$this->dataunit_model->delete($data,$datauser);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/dataunit'),'refresh');
	}


}


/* End of file dataunit.php */
/* Location: ./application/controllers/admin/dataunit.php */