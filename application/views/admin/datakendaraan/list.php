<p>
	<a href="<?php echo base_url('admin/datakendaraan/tambah') ?>" class="btn-success btn-sm">
		<i class="fa fa-plus"></i> Input Data Kendaraan
	</a>
</p>


<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?> 

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>Kode Kendaraan</th>
			<th>Jenis Kendaraan</th>
			<th>Nomor Polisi</th>
			<th>Gambar Kendaraan</th>
			<th>Kapasitas</th>
			<th>Warna</th>
			<th>Jumlah Roda</th>
			<th>Peruntukkan</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($datakendaraan as $datakendaraan) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $datakendaraan->kode_kendaraan ?></td>
			<td><?php echo $datakendaraan->jenis_kendaraan ?></td>
			<td><?php echo $datakendaraan->nomor_polisi ?></td>
			<td align="center"><img width="80%" style="max-width:600px; max-height: 600px" class="img-thumbnail" src="<?php echo base_url('/assets/images/kendaraan/' . $datakendaraan->gambar_kendaraan);?>" alt="gambar rusak"></td>
			<td><?php echo $datakendaraan->kapasitas ?></td>
			<td><?php echo $datakendaraan->warna ?></td>
			<td><?php echo $datakendaraan->jumlah_roda ?></td>
			<td><?php echo $datakendaraan->peruntukkan ?></td>
			<td>
				<a href="<?php echo base_url('admin/datakendaraan/edit/'.$datakendaraan->kode_kendaraan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/datakendaraan/delete/'.$datakendaraan->kode_kendaraan) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>