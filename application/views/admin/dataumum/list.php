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
			<th>Nama</th>
			<th>Kontak</th>
			<th>Kelas</th>
			<th>Username</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($dataumum as $dataumum) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $dataumum->nama  ?></td>
			<td><?php echo $dataumum->kontak ?></td>
			<td><?php echo $dataumum->kelas ?></td>
			<td><?php echo $dataumum->username  ?></td>
			<td>
				<a href="<?php echo base_url('admin/dataumum/edit/'.$dataumum->id_umum) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/dataumum/delete/'.$dataumum->id_umum) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>