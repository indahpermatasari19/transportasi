<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datajurusan extends CI_Controller {

		// Load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datajurusan_model');
		}

		// Data Jurusan
		public function index()
		{
			$datajurusan = $this->datajurusan_model->listing();

			$data = array( 'title'  => 'Data Jurusan',
							'datajurusan' => $datajurusan,
							'isi' => 'admin/datajurusan/list'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}

		// Tambah Data Jurusan
		
	// Edit Data Jurusan
	public function edit($id_jurusan)
    {   
        $datajurusan = $this->datajurusan_model->detail($id_jurusan);

        //Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_jurusan','nama_jurusan  ','required',
            array('required' => '%s harus diisi'
            ));

        if($valid->run()) {
        	// Check jika gambar diganti

        	if(!empty($_FILES['logo']['name'])) {

                $config['filename'] = $_FILES['logo']['name'];
                $config['upload_path'] = "./assets/upload/logojurusan/";
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
                $data = array('title'   => 'Edit datajurusan',
                              'datajurusan' => $datajurusan,
                              'isi'     => 'admin/datajurusan/edit');
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk database
                } else {
                	$upload_gambar = array('upload_data' => $this->upload->data());

                	// Create thumbnail logo
                		$config['image_library']		= 'gd2';
        				$config['source_image']			= '/assets/upload/logojurusan/'.$upload_gambar['upload_data']['file_name'];
        				// Lokasi folder thumbnail
        				$config['new_image']			= './assets/upload/logojurusan/';
        				$config['create_thumb']			= TRUE;
        				$config['maintain_ratio'] 		= TRUE;
        				$config['width']         		= 250;
        				$config['height']       		= 250;

        				$this->load->library('image_lib', $config);
        				$this->image_lib->resize();

                	// End create thumbnail	


                    $i = $this->input;
                    $data = array(  'id_jurusan'=> $i->post('id_jurusan'),
                                    'logo'=> $upload_gambar['upload_data']['file_name'],
                                    'ketua_jurusan'=> $i->post('ketua_jurusan'),
                                    );
                    $datauser = array(
                                    'id_user' => $i->post('id_user'),
                                    'nama'=> $i->post('nama_jurusan'),
                                    'kontak' => $i->post('kontak'),
                                    );

                    $this->datajurusan_model->edit($data,$datauser);
                    $this->session->set_flashdata('sukses', 'Data telah diubah');
                    redirect(base_url('admin/datajurusan'),'refresh');
                }
            } else {
        	// Edit produk tanpa ganti gambar

            }
        }
        //End masuk database
        $data = array( 'title' => 'Edit Data Jurusan',
        	'datajurusan' => $datajurusan,
        	'isi' => 'admin/datajurusan/edit'
        	);
        $this->load->view('admin/layout/wrapper', $data, FALSE);
}
		

	// Delete Data Jurusan
	public function delete($id_jurusan)
	{
            $datajurusan = $this->datajurusan_model->detail($id_jurusan);
            $fileImage = 'assets\upload\logojurusan\\' . $datajurusan->logo;

            if(file_exists(FCPATH . $fileImage)) {
                if(!unlink($fileImage)){
                    echo 'Gagal Menghapus File';
                }
            }

			$data = array('id_jurusan' => $id_jurusan);
            $datauser = $this->datajurusan_model->getIdUserbyId($id_jurusan);
			$this->datajurusan_model->delete($data,$datauser);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/datajurusan'),'refresh');
	}


}


/* End of file Datajurusan.php */
/* Location: ./application/controllers/admin/datajurusan.php */