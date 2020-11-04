

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
			<th>Kode Booking</th>
			<th>Nama Kegiatan</th>
			<th>Surat Izin Kegiatan</th>
			<th>Tanggal Peminjaman</th>
			<th>Tanggal Kembali</th>
			<th>Alamat Tujuan</th>
			<th>Jam Keberangkatan</th>
			<th>Penanggung Jawab</th>
			<th>Nama Sopir</th>
			<th>Status</th>  
			<th>Aksi</th>
		</tr> 
	</thead>
	<tbody>
		<?php $no=1; foreach ($datapeminjaman as $datapeminjaman)  { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $datapeminjaman->kode_booking ?></td>
			<td><?php echo $datapeminjaman->nama_kegiatan ?></td>
			<td><?php echo $datapeminjaman->surat_izinkegiatan ?></td>
			<td><?php echo $datapeminjaman->tanggal_peminjaman ?></td>
			<td><?php echo $datapeminjaman->tanggal_kembali ?></td>
			<td><?php echo $datapeminjaman->alamat_tujuan ?></td>
			<td><?php echo $datapeminjaman->jam_keberangkatan ?></td>
			<td><?php echo $datapeminjaman->penanggung_jawab ?></td>
			<td><?php echo $datapeminjaman->nama_sopir ?></td>
			<td><!-- 
				<select name="" class="btn">
					<option value="pending" 
					<?php if ($datapeminjaman->status == 'pending') : echo 'selected'; ?>
					<?php endif ?>>Pending</option>
					<option value="confirm"
					<?php if ($datapeminjaman->status == 'confirm') : echo 'selected'; ?>
					<?php endif ?>>Confirm</option>}
					<option value="cancel"
					<?php if ($datapeminjaman->status == 'cancel') : echo 'selected'; ?>
					<?php endif ?>>Cancel</option>}
				</select> -->
				<div class="dropdown">
					<a href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
					
					<?php if ($datapeminjaman->status == 'pending') : echo 'Pending'; ?>
						<?php endif ?>
						<?php if ($datapeminjaman->status == 'confirm') : echo 'Confirm'; ?>
						<?php endif ?>
						<?php if ($datapeminjaman->status == 'cancel') : echo 'Cancel'; ?>
						<?php endif ?>
					
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
				   		<li><a href="<?=base_url('admin/datapeminjaman/editStatus/' . $datapeminjaman->kode_booking) . '/pending'?>">Pending</a></li>
				   		<li><a href="<?=base_url('admin/datapeminjaman/editStatus/' . $datapeminjaman->kode_booking) . '/confirm'?>">Confirm</a></li>
				   		<li><a href="<?=base_url('admin/datapeminjaman/editStatus/' . $datapeminjaman->kode_booking) . '/cancel'?>">Cancel</a></li>
				   	</ul>
				</div>   
			</td>
			<td>

				<a href="<?php echo base_url('admin/datapeminjaman/delete/'.$datapeminjaman->kode_booking) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>