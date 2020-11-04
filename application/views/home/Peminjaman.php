<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Peminjaman</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

<!-- Contact -->

	<div class="contact">
		

		<!-- Contact Info -->

		<div class=""><br>  
			<div class="container">
				<div class="row">

				<div class="col-lg-12 text-center">
					<h3> Daftar Transportasi</h3><br>
					</div>

					<table class="table table-bordered table-striped">
							<thead>
								 <tr>
									<th class="form_title text-center" width="50px">No</th>
									<th class="form_title text-center">Jenis Kendaraan</th>
									<th class="form_title text-center">Nomor Polisi</th>
									<th class="form_title text-center">Kapasitas</th>
									<th class="form_title text-center">Warna</th>
									<th class="form_title text-center">Jumlah Roda</th>
									<th class="form_title text-center">Diperuntukkan</th>
									<th class="form_title text-center">Gambar Kendaraan</th>
									<th class="form_title text-center">Status</th>
									<th class="form_title text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>

								<?php $no=1; foreach($datakendaraan as $kendaraan) : ?>
								
								<tr>
									<td class="form_title text-center"><?=$no++;?></td>
									<td class="form_title"><?=$kendaraan->jenis_kendaraan;?></td>
									<td class="form_title"><?=$kendaraan->nomor_polisi?></td>
									<td class="form_title"><?=$kendaraan->kapasitas?></td>
									<td class="form_title"><?=$kendaraan->warna?></td>
									<td class="form_title"><?=$kendaraan->jumlah_roda?></td>
									<td class="form_title"><?=$kendaraan->peruntukkan?></td>
									<td align="center"><img width="80%" style="max-width:600px; max-height: 600px" class="img-thumbnail" src="<?php echo base_url('/assets/images/kendaraan/' . $kendaraan->gambar_kendaraan);?>" alt="gambar rusak"></td>
									<td class="form_title text-center"><?php if($kendaraan->status == 'enable') {
									 echo '<p class="btn btn-success btn-sm">Tersedia</p>';}
									 else { echo '<p class="btn btn-danger btn-sm">Tidak Tersedia</p>'; } ?></td>
									<td> 
										<a href="<?php if($kendaraan->status == 'enable') { 
														echo base_url('home/peminjaman_detail/' . $kendaraan->kode_kendaraan); } ?>" class="btn btn-primary btn-sm"><i class="fa fa-viewmore"></i>Pinjam</a>
									</td>
								</tr>
								<?php endforeach; ?>

							</tbody>
						</table><br>

						<div class="col-lg-12 text-center">
					<h3> Daftar Sopir</h3><br>
					</div>

					<table class="table table-bordered table-striped">
							<thead>
								 <tr>
									<th class="form_title text-center" width="50px">No</th>
									<th class="form_title text-center">Nama</th>
									<th class="form_title text-center">Nomor Hp</th>
									<th class="form_title text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach ($datasopir as $sopir) :?>
								<tr align="center">
									<td class="form_title text-center"><?=$no++?></td>
									<td class="form_title"><?= $sopir->nama;?></td>
									<td class="form_title"><?= $sopir->kontak;?></td>
									<td class="form_title"><?php if($sopir->status == 'enable') {
									 echo '<p class="btn btn-success btn-sm">Tersedia</p>';}
									 else { echo '<p class="btn btn-danger btn-sm">Tidak Tersedia</p>'; } ?> </td>
								</tr>
							<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>  

<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(<?= base_url() ?>template/frontend/images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>