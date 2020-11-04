

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
		<?php $no=1; foreach ($cancel as $cancel)  { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $cancel->kode_booking ?></td>
			<td><?php echo $cancel->nama_kegiatan ?></td>
			<td><img width="100%" style="width=100px; height: 100px; " class="img-thumbnail" src="<?php echo base_url('/file/surat-izin/' . $cancel->surat_izinkegiatan);?>" alt="file"></td>
			<td><?php echo $cancel->tanggal_peminjaman ?></td>
			<td><?php echo $cancel->tanggal_kembali ?></td>
			<td><?php echo $cancel->alamat_tujuan ?></td>
			<td><?php echo $cancel->jam_keberangkatan ?></td>
			<td><?php echo $cancel->penanggung_jawab ?></td>
			<td><?php echo $cancel->nama_sopir ?></td>
			<td><!-- 
				<select name="" class="btn">
					<option value="pending" 
					<?php if ($cancel->status == 'pending') : echo 'selected'; ?>
					<?php endif ?>>Pending</option>
					<option value="confirm"
					<?php if ($cancel->status == 'confirm') : echo 'selected'; ?>
					<?php endif ?>>Confirm</option>}
					<option value="cancel"
					<?php if ($cancel->status == 'cancel') : echo 'selected'; ?>
					<?php endif ?>>Cancel</option>}
				</select> -->
				<div class="dropdown">
					<a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
					
					<?php if ($cancel->status == 'pending') : echo 'Pending'; ?>
						<?php endif ?>
						<?php if ($cancel->status == 'confirm') : echo 'Confirm'; ?>
						<?php endif ?>
						<?php if ($cancel->status == 'cancel') : echo 'Cancel'; ?>
						<?php endif ?>
					
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
				   		<li><a href="<?=base_url('admin/cancel/editStatus/' . $cancel->kode_booking) . '/pending'?>">Pending</a></li>
				   		<li><a href="<?=base_url('admin/cancel/editStatus/' . $cancel->kode_booking) . '/confirm'?>">Confirm</a></li>
				   		<li><a href="<?=base_url('admin/cancel/editStatus/' . $cancel->kode_booking) . '/cancel'?>">Cancel</a></li>
				   	</ul>
				</div>   
			</td>
			<td>

				<a href="<?php echo base_url('admin/cancel/delete/'.$cancel->kode_booking) ?>" class="btn btn-danger btn-xs" onclict="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus </a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>