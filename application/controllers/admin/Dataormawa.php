<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataormawa extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('dataormawa_model');
		}

		// Data Ormawa
		public function index()
		{
			$dataormawa = $this->dataormawa_model->listing();

			$data = array( 'title'  => 'Data Ormawa',
							'dataormawa' => $dataormawa,
							'isi' => 'admin/dataormawa/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		

	/// Edit Data Jurusan
    public function edit($id_ormawa)
    {   
        $dataormawa = $this->dataormawa_model->detail($id_ormawa);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_ormawa','nama_ormawa  ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()) {
            // Check jika gambar diganti

            if(!empty($_FILES['logo']['name'])) {

                $config['filename'] = $_FILES['logo']['name'];
                $config['upload_path'] = "./assets/upload/logoormawa/";
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']  = '2400';
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ( !$this->upload->do_upload('logo')){
                   $error = array('error' => $this->upload->display_errors());
                   var_dump($error);
                   die();
                }
                else{
                    $data = array('upload_data' => $this->upload->data('logo'));
                    echo "success";

                }
            

                if($valid->run()==FALSE){
                //End Validasi
                $data = array('title'   => 'Edit Data Ormawa',
                              'dataormawa' => $dataormawa,
                              'isi'     => 'admin/dataormawa/edit');
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    // Create thumbnail logo
                        $config['image_library']        = 'gd2';
                        $config['source_image']         = '/assets/upload/logoormawa/'.$upload_gambar['upload_data']['file_name'];
                        // Lokasi folder thumbnail
                        $config['new_image']            = './assets/upload/logoormawa/';
                        $config['create_thumb']         = TRUE;
                        $config['maintain_ratio']       = TRUE;
                        $config['width']                = 250;
                        $config['height']               = 250;

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                    // End create thumbnail 


                    $i = $this->input;
                    $data = array(  'id_ormawa'=> $i->post('id_ormawa'),
                                    'logo'=> $upload_gambar['upload_data']['file_name'],
                                    'pembina'=> $i->post('pembina'),
                                    );
                    $datauser = array(
                                    'id_user' => $i->post('id_user'),
                                    'nama'=> $i->post('nama_ormawa'),
                                    'kontak' => $i->post('kontak'),
                                    );

                    $this->dataormawa_model->edit($data,$datauser);
                    $this->session->set_flashdata('sukses', 'Data telah diubah');
                    redirect(base_url('admin/dataormawa'),'refresh');
                }
            } else {
            // Edit produk tanpa ganti gambar

            }
        }
        //End masuk database
        $data = array( 'title' => 'Edit Data Jurusan',
            'dataormawa' => $dataormawa,
            'isi' => 'admin/dataormawa/edit'
            );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
}
        

    // Delete Data Jurusan
    public function delete($id_ormawa)
    {
            $dataormawa = $this->dataormawa_model->detail($id_ormawa);
            $fileImage = 'assets\upload\logoormawa\\' . $dataormawa->logo;

            if(file_exists(FCPATH . $fileImage)) {
                if(!unlink($fileImage)){
                    echo 'Gagal Menghapus File';
                }
            }

            $data = array('id_ormawa' => $id_ormawa);
            $datauser = $this->dataormawa_model->getIdUserbyId($id_ormawa);
            $this->dataormawa_model->delete($data,$datauser);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/dataormawa'),'refresh');
    }

}


/* End of file dataormawa.php */
/* Location: ./application/controllers/admin/dataormawa.php */