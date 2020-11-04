


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
			<th>Nama Ormawa</th>
			<th>Logo</th>
			<th>Pembina</th>
			<th>Kontak</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($dataormawa as $dataormawa) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $dataormawa->username ?></td>
			<td><?php echo $dataormawa->nama ?></td>
			<td><img src="<?php echo base_url('assets/upload/logoormawa/'.$dataormawa->logo) ?>" class="img img-responsive img-thumbnail" width="60" alt=""></td> 
			<td><?php echo $dataormawa->pembina ?></td>
			<td><?php echo $dataormawa->kontak ?></td>
			<td>
				<a href="<?php echo base_url('admin/dataormawa/edit/'.$dataormawa->id_ormawa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/dataormawa/delete/'.$dataormawa->id_ormawa) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>