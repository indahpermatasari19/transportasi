<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Bukti</li>
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
					<h3> </h3><br>
					</div>

					<table class="table table-bordered table-striped">
							<thead>
								 <tr>
									<th class="form_title text-center" width="50px">No</th>
									<th class="form_title text-center">Kode Booking</th>
									<th class="form_title text-center">Tanggal Peminjaman</th>
									<th class="form_title text-center">Alamat Tujuan</th>
									<th class="form_title text-center">Tanggal Kembali</th>
									<th class="form_title text-center">Status</th>
									<th class="form_title text-center">Opsi</th>
								</tr>
							</thead>
							<tbody>
							<?php $no=1; foreach($datapeminjaman as $peminjaman) : ?>
								<tr>
									<td class="form_title text-center"><?=$no++;?></td>
									<td class="form_title text-center"><?=$peminjaman->kode_booking;?></td>
									<td class="form_title text-center"><?=$peminjaman->tanggal_peminjaman;?></td>
									<td class="form_title text-center"><?=$peminjaman->alamat_tujuan;?></td>
									<td class="form_title text-center"><?=$peminjaman->tanggal_kembali;?></td>
									<td class="form_title text-center"><p class="btn btn-success btn-sm">Confirm</p></td>
									<td class="form_title text-center">
										<a href="<?=base_url('home/getInvoice/' . $peminjaman->kode_booking)?>" class="btn btn-primary btn-sm" >Bukti Acc</a>
										<a href="<?=base_url('home/editKembali/' . $peminjaman->kode_booking)?>" class="btn btn-danger btn-sm" >Kembalikan</a>
									</td>
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