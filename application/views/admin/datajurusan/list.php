


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
			<th>Nama Jurusan</th>
			<th>Logo</th>
			<th>Ketua Jurusan</th>
			<th>Kontak</th>
			<th>Aksi</th>  
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($datajurusan as $datajurusan) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $datajurusan->username  ?></td>
			<td><?php echo $datajurusan->nama  ?></td>
			<td><img src="<?php echo base_url('assets/upload/logojurusan/'.$datajurusan->logo) ?>" class="img img-responsive img-thumbnail" width="60" alt=""></td>  
			<td><?php echo $datajurusan->ketua_jurusan ?></td>
			<td><?php echo $datajurusan->kontak ?></td>
			<td>
				<a href="<?php echo base_url('admin/datajurusan/edit/'.$datajurusan->id_jurusan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit </a>

				<a href="<?php echo base_url('admin/datajurusan/delete/'.$datajurusan->id_jurusan) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>