<!-- <p>
	<a href="<?=base_url('admin/datasopir/tambah')?>" class="btn-success btn-sm">
		<i class="fa fa-plus"></i> Input Data Sopir
	</a>
</p> -->
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
			<th>Username</th>
			<th>Nama</th>
			<th>Kontak</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($datasopir as $datasopir) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $datasopir->username ?></td>
			<td><?php echo $datasopir->nama ?></td>
			<td><?php echo $datasopir->kontak ?></td>
			<td>
				<a href="<?php echo base_url('admin/datasopir/edit/'.$datasopir->id_sopir) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/datasopir/delete/'.$datasopir->id_sopir. '/' . $datasopir->id_user) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>