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
					<h3> Jadwal Peminjaman </h3><br>
					</div>

					<table class="table table-bordered table-striped">
							<thead>
								 <tr>
									<th class="form_title text-center" width="50px">No</th>
									<th class="form_title text-center">Nama Sopir</th>
									<th class="form_title text-center">Nomor Polisi</th>
									<th class="form_title text-center">Alamat Tujuan</th>
									<th class="form_title text-center">Tanggal Peminjaman</th>
									<th class="form_title text-center">Nama Peminjaman</th>
								</tr>
							</thead>
							<tbody>
							<?php $no=1; foreach($datapeminjaman as $peminjam) : ?>
								<tr>
									<td class="form_title text-center"><?=$no++?></td>
									<td class="form_title text-center"><?=$peminjam->nama_sopir?></td>
									<td class="form_title text-center"><?=$peminjam->nomor_polisi?></td>
									<td class="form_title text-center"><?=$peminjam->alamat_tujuan?></td>
									<td class="form_title text-center"><?=$peminjam->tanggal_peminjaman?></td>
									<td class="form_title text-center"><?=$peminjam->nama?></td>
								</tr>
							<?php endforeach;?>
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