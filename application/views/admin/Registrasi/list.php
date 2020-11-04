<p>
	<a href="<?php echo base_url('admin/registrasi/tambah') ?>" class="btn-success btn-sm">
		<i class="fa fa-plus"></i> Input Data unit
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
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>  
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($Registrasi as $registrasi) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $registrasi->nama ?></td>
			<td><?php echo $registrasi->username ?></td>
			<td><?php echo $registrasi->password ?></td>
			<td><?php echo $registrasi->level ?></td>
			<td>
				<a href="<?php echo base_url('admin/registrasi/edit/'.$registrasi->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/registrasi/delete/'.$registrasi->id_user) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>