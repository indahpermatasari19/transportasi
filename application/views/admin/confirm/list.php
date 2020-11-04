

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
		<?php $no=1; foreach ($confirm as $confirm)  { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $confirm->kode_booking ?></td>
			<td><?php echo $confirm->nama_kegiatan ?></td>
			<td><img width="100%" style="width:100px; height: 100px;" class="img-thumbnail" src="<?php echo base_url('/file/surat-izin/' . $confirm->surat_izinkegiatan);?>" alt="file"></td>
			<td><?php echo $confirm->tanggal_peminjaman ?></td>
			<td><?php echo $confirm->tanggal_kembali ?></td>
			<td><?php echo $confirm->alamat_tujuan ?></td>
			<td><?php echo $confirm->jam_keberangkatan ?></td>
			<td><?php echo $confirm->penanggung_jawab ?></td>
			<td><?php echo $confirm->nama_sopir ?></td>
			<td><!-- 
				<select name="" class="btn">
					<option value="pending" 
					<?php if ($confirm->status == 'pending') : echo 'selected'; ?>
					<?php endif ?>>Pending</option>
					<option value="confirm"
					<?php if ($confirm->status == 'confirm') : echo 'selected'; ?>
					<?php endif ?>>Confirm</option>}
					<option value="cancel"
					<?php if ($confirm->status == 'cancel') : echo 'selected'; ?>
					<?php endif ?>>Cancel</option>}
				</select> -->
				<div class="dropdown">
					<a href="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
					
					<?php if ($confirm->status == 'pending') : echo 'Pending'; ?>
						<?php endif ?>
						<?php if ($confirm->status == 'confirm') : echo 'Confirm'; ?>
						<?php endif ?>
						<?php if ($confirm->status == 'cancel') : echo 'Cancel'; ?>
						<?php endif ?>
					
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
				   		<li><a href="<?=base_url('admin/confirm/editStatus/' . $confirm->kode_booking) . '/pending'?>">Pending</a></li>
				   		<li><a href="<?=base_url('admin/confirm/editStatus/' . $confirm->kode_booking) . '/confirm'?>">Confirm</a></li>
				   		<li><a href="<?=base_url('admin/confirm/editStatus/' . $confirm->kode_booking) . '/cancel'?>">Cancel</a></li>
				   	</ul>
				</div>   
			</td>
			<td>

				<a href="<?php echo base_url('admin/confirm/delete/'.$confirm->kode_booking) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>