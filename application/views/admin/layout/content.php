<?php
// Memanggil data isi content dari controller variabel isi
if( $isi )
{
	// $data["level"] = $level;
	$this->load->view($isi);
}