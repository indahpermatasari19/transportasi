<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class Simple_login
{
	protected$CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		// load data model user
		$this->CI->load->model('user_model');
	}

	// fungi login 
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user , maka cerae sessiaon login
		if ($check ) {
			# code...
			$id_user  =$check->id_user;
			$nama  =$check->nama;
			$password  =$check->password;
			//$nama =$check->nama;
			$level =$check->level;
			$kontak = $check->kontak;
			//  create  seseiaon 

			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('password',$password);
			$this->CI->session->set_userdata('kontak', $kontak);
			$this->CI->session->set_userdata('level',$level);
			if($level == '0'){
				redirect(base_url('admin/dasbord'),'refresh');
			} else {
				redirect(base_url('home'),'refresh');
			}	
		}
		
		else{
			// jika tidak ada data atau user name atau passwor salah
			$this->CI->session->set_flashdata('warning',' username atau password salah ');
			redirect(base_url('login'),'refresh');
 
			//$this->CI->session->set_flashdata('warning',' username atau password salah ');
			//redirect(base_url('login'),'refresh');
		}

	}

	// fungsi cek login 
	public function cek_login()
	{
		// memeriksa appakah session sudah ada atau belum 
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','anda belum login ');
			redirect(base_url('login'),'refresh');

			# code...
		}
	}

	//  fungsi log out 
	public function logout(){
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
		//$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('level');
		// setelah di buang redirect ke login
		$this->CI->session->set_flashdata('sukses','anda berhasil logout ');
			redirect(base_url('login'),'refresh');

	}

}