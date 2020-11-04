<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('datakendaraan_model');
		$this->load->model('datasopir_model');
		$this->load->model('datapeminjaman_model');
		$this->load->model('user_model');
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

		$datapeminjam = $this->datapeminjaman_model->listingHome();
		date_default_timezone_set('Asia/Jakarta');
		

		$date_now = date("Y-m-d");
		$time_now = date("H:i");
		foreach ($datapeminjam as $key => $value) {
			$date_book = $value->tanggal_kembali;
			$status = '';
			// $time_book = $value->
			// echo "sekarang : ". $date_now;
			// echo "bookingan :" . $date_book . "<br>";
			if($date_now > $date_book){

				// echo "menjadi tersedia pada hari tersebut";
				$status = 'enable';

				
			} else {
				// echo "menjadi tak tersedia pada hari tersebut";
				$status = 'disable';
				
			}
            $datasopir = array(   
            				'id_sopir' => $value->id_sopir,
            				'status'=> $status
                            );
            $datakendaraan = array(   
            				'kode_kendaraan' => $value->kode_kendaraan,
            				'status'=> $status
                            );
            // var_dump($datasopir);
            // var_dump($datakendaraan);
            $this->datapeminjaman_model->updateCancel($datasopir,$datakendaraan);							
		}
	}

	public function index()
	{
		$datapeminjam = $this->datapeminjaman_model->listingHome();
		// var_dump($datapeminjam);
		// die();

		foreach ($datapeminjam as $peminjaman => $key){
			
				if($key->id_sopir != 0){
					$sopir = $this->datasopir_model->detail($key->id_sopir);
					$key->nama_sopir = $sopir->nama;
				}

			}

		$data = array( 'title' => 'Sistem Informasi Peminjaman Transportasi',
					'isi' => 'home/list',
					'userdata' => $this->session->userdata('username'),
					'userlevel' => $this->session->userdata('level'),
					'datapeminjaman' => $datapeminjam
			);


		// check tanggal booking
		



		// die();

		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function peminjaman()
	{
		$datakendaraan = $this->datakendaraan_model->listing();
		$datasopir = $this->datasopir_model->listing();


		$data = array(
				'title' => 'Peminjaman',
				'datakendaraan' => $datakendaraan,
				'datasopir' => $datasopir,
				'isi'   => 'home/peminjaman',
				'userlevel' => $this->session->userdata('level'),
				'userdata' => $this->session->userdata('username'),

			);

		$this->load->view('layout/wrapper', $data, FALSE);
	}


	public function peminjaman_detail($kode_kendaraan)
	{
		$datakendaraan = $this->datakendaraan_model->detail($kode_kendaraan);

		// $datasopir = $this->datasopir_model->sopirEnable();

		$data = array(
				'title' => 'Peminjaman',
				'datakendaraan' => $datakendaraan,
				// 'datasopir' => $datasopir,
				'isi'   => 'home/peminjaman_detail',
				'userlevel' => $this->session->userdata('level'),
				'userdata' => $this->session->userdata('username')

			);

		$this->load->view('layout/wrapper', $data, FALSE);
	}
	public function booking($kode_kendaraan)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan','Nama Kegiatan','required',
			array( 'required' => '% harus diisi')
		);

			

		if($valid->run()===FALSE) {
			// $datasopir = $this->datasopir_model->listing();
			$datakendaraan = $this->datakendaraan_model->detail($kode_kendaraan);

				// End validasi

			$data = array( 'title'  => 'Tambah Data Peminjaman',
							// 'datasopir' => $datasopir,
							'datakendaraan' => $datakendaraan,
							'isi' => 'home/peminjaman_detail',
							'userlevel' => $this->session->userdata('level'),
							'userdata' => $this->session->userdata('username')

						);
			$this->load->view('layout/wrapper', $data, FALSE);
			// Masuk database
		}else{
			
			//upload file
			
			$file = $_FILES['surat']['name'];
			// var_dump($file);
			// die();
			$config['file_name'] = $file;
			$config['allowed_types'] = "jpg|png|jfif|bmp|jpeg";
			$config['max_size'] = 10000;
			$config['upload_path'] = "./file/surat-izin/";

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('surat')){
				$error = array('error' => $this->upload->display_errors());
				// $datasopir = $this->datasopir_model->sopirEnable();
				$datakendaraan = $this->datakendaraan_model->detail($kode_kendaraan);

				// End validasi

				$data = array( 'title'  => 'Tambah Data Peminjaman',
								// 'datasopir' => $datasopir,
								'datakendaraan' => $datakendaraan,
								'isi' => 'home/peminjaman_detail',
								'userlevel' => $this->session->userdata('level'),
								'userdata' => $this->session->userdata('username')

							);
				$this->load->view('layout/wrapper', $data, $error, FALSE);
			}

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 10; $i++){
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$kode = $randomString;
			// var_dump($kode);
			// die();
			$i = $this->input;
			$data = array( 'kode_booking' => $kode,
						   'nama_kegiatan' => $i->post('nama_kegiatan'),
						   'surat_izinkegiatan' => $file,
					       'tanggal_peminjaman' => $i->post('tanggal_peminjaman'),
					       'tanggal_kembali' => $i->post('tanggal_kembali'),
					       'alamat_tujuan' => $i->post('alamat_tujuan'),
					       'jam_keberangkatan' => $i->post('jam_keberangkatan'),
					       'penanggung_jawab' => $i->post('penanggung_jawab'),
					       'no_hp' => $i->post('no_hp'),
					       // 'nama_sopir' => $i->post('nama_sopir'),
					       'status' => 'pending',
					       'kode_kendaraan' => $i->post('kode_kendaraan'),
					       'id_user' => $this->session->userdata('id_user')
				);
			$databooking = array(
					'status' => 'disable'
				);

			
			$this->datapeminjaman_model->tambah($data);
			$this->datakendaraan_model->updateStatus($i->post('kode_kendaraan'),$databooking);
			// $this->datasopir_model->updateStatus($i->post('nama_sopir'), $databooking);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('home/peminjaman'),'refresh');
		}
		// End masuk database
	}


	public function bukti()
	{
		$datapeminjaman = $this->datapeminjaman_model->listingBukti();


		$data = array(
				'title' => 'Bukti',
				'datapeminjaman' => $datapeminjaman,
				'isi'   => 'home/bukti',
				'userlevel' => $this->session->userdata('level'),
				'userdata' => $this->session->userdata('username')

			);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function getInvoice($kode_booking){
		$this->load->library('pdf');
		
		$data = array(
				'title' => 'Profile', 
				'hasil' => $this->datapeminjaman_model->getBuktiKendaraan($kode_booking),
				'isi'   => 'home/invoice-bukti'
			);
		$this->load->view('home/invoice-bukti',$data);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);
		// var_dump($html);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Bukti Reservasi.pdf", array('Attachment' =>0));
		exit;

	}

	public function profile()
	{	
        $data_user = $this->user_model->detail($this->session->userdata('id_user'));
		
		$data = array(
				'title' => 'Profile',
				'isi'   => 'home/profile',
				'userlevel' => $this->session->userdata('level'),
				'userdata' => $data_user
				
			);


		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function editProfile()
	{
		$valid = $this->form_validation;

        $valid->set_rules('nama','nama  ','required',
            array('required' => '%s harus diisi'
            ));

        $data_user = $this->user_model->detail($this->session->userdata('id_user'));


        if($valid->run()==FALSE){
        //End Validasi
			$data = array(
					'title' => 'Edit Profile',
					'isi'   => 'home/edit-profile',
					'userlevel' => $this->session->userdata('level'),
					'userdata' => $data_user
					
				);
		$this->load->view('layout/wrapper', $data, FALSE);

        //Masuk database
        }else{
            $i = $this->input;

            $data = array(   
            				'id_user'=> $i->post('id_user'),
            				'username' => $i->post('username'),
                            'nama'=> $i->post('nama'),
                            'kontak'=> $i->post('kontak'),
                            );

            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('home/profile'),'refresh');
        }
        //End masuk database

	}

	public function editPassword()
	{

		$valid = $this->form_validation;

        $valid->set_rules('new_password', 'Password Baru', 'required');
        $valid->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');

        $data_user = $this->user_model->detail($this->session->userdata('id_user'));


        if($valid->run()==FALSE){
        //End Validasi
			$data = array(
					'title' => 'Edit Password',
					'isi'   => 'home/edit-password',
					'userlevel' => $this->session->userdata('level'),
					'userdata' => $data_user
					
				);


			$this->load->view('layout/wrapper', $data, FALSE);
        //Masuk database
        }else{
            $i = $this->input;
            $data = array(   
            				'id_user'=> $i->post('id_user'),
            				'password' => SHA1($i->post('new_password')),
                            );

            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('home/profile'),'refresh');
        }
        //End masuk database
	}

	public function editKembali($kode){
		$databooking = $this->datapeminjaman_model->getKodeWithAllData($kode);

		$valid = $this->form_validation;

        $valid->set_rules('tanggal_kembali', 'Tanngal Kembali', 'required');


        if($valid->run()==FALSE){
        //End Validasi
			$data = array( 'title' => 'Edit Tanggal Kembali',
						'isi' => 'home/edit_tanggal_kembali',
						'userlevel' => $this->session->userdata('level'),
						'userdata' => $this->session->userdata('username'),
						'databooking' => $databooking
				);
			$this->load->view('layout/wrapper', $data, FALSE);

        //Masuk database
        }else{
            $i = $this->input;
            $status = 'enable';
            $data = array(   
            				'kode_booking' => $databooking->kode_booking,
            				'tanggal_kembali'=> $i->post('tanggal_kembali')
                            );
            $datasopir = array(   
            				'id_sopir' => $databooking->id_sopir,
            				'status'=> $status
                            );
            $datakendaraan = array(   
            				'kode_kendaraan' => $databooking->kode_kendaraan,
            				'status'=> $status
                            );

            // die();
            $this->datapeminjaman_model->updateTanggalKembali($data,$datasopir,$datakendaraan);
            $this->session->set_flashdata('sukses', 'Data telah diubah');
            redirect(base_url('home/bukti'),'refresh');
        }
        //End masuk database
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */