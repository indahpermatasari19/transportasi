

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
			<th>Nama Unit</th>
			<th>Kepala Unit</th>
			<th>Admin</th>
			<th>Kontak</th>
			<th>Username</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($dataunit as $dataunit) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $dataunit->nama ?></td>
			<td><?php echo $dataunit->kepala_unit ?></td>
			<td><?php echo $dataunit->admin_unit ?></td>
			<td><?php echo $dataunit->kontak ?></td>
			<td><?php echo $dataunit->username ?></td>
			<td>
				<a href="<?php echo base_url('admin/dataunit/edit/'.$dataunit->id_unit) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/dataunit/delete/'.$dataunit->id_unit) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>