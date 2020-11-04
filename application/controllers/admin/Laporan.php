<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('datalaporan_model');
	}

	public function index()
	{
		$data = array( 'title' => 'Halaman Laporan',
						'isi'  => 'admin/laporan/list',
						'tahun' => '',
						'bulan' => '',
						'detail' => []
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function filter()
	{

		if (!empty($this->input->post('tahun'))) {
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$data = array( 'title' => 'Halaman Laporan',
							'isi'  => 'admin/laporan/list',
							'tahun' => $this->input->post('tahun'),
							'bulan' => $this->input->post('bulan'),
							'detail' => $this->datalaporan_model->listing($tahun,$bulan)
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			
		} else {
			redirect(base_url('admin/laporan'));
		}
		
		// $detail = $this->datalaporan_model->listing($tahun,$bulan);


	}

	public function cetak($tahun = null, $bulan = null){
        $this->load->library('pdf');
        $data = array( 'title' => 'Halaman Laporan',
						'isi'  => 'admin/laporan/cetak_laporan',
						'tahun' => $tahun,
						'bulan' => $bulan,
						'detail' => $this->datalaporan_model->listing($tahun,$bulan)
					);
		$this->load->view('admin/laporan/cetak_laporan', $data, FALSE);

	
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
        $this->dompdf->stream("Laporan_perperiode.pdf", array('Attachment' =>0));
        exit;
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */