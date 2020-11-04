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
				<div class="form-group">

				<div class="col-lg-12 text-center">
					<h3> Daftar Transportasi</h3><br>
					</div>

							<!-- Contact Form -->
					<?php echo form_open_multipart('home/booking/' . $datakendaraan->kode_kendaraan); ?>
								
					<div class="col-lg-12">
						<div class="contact_form"><br>
									<div class="form-group">
										<div class="form_title">Nama Kegiatan</div>
										<input type="text" class="comment_input" required="required" name="nama_kegiatan">
									</div>
									<div class="form-group">
										<div class="form_title">Surat Izin Kegiatan</div>
										<input type="file" class="comment_input"  name="surat">
									</div>

									<div class="form-group">
										<div class="form_title">Tanggal Peminjaman</div>
										<input type="date" class="comment_input" required="required" name="tanggal_peminjaman">
									</div>

									<div class="form-group">
										<div class="form_title">Tanggal Kembali</div>
										<input type="date" class="comment_input" required="required" name="tanggal_kembali">
									</div>

									<div class="form-group">
										<div class="form_title">Alamat Tujuan</div>
										<input type="text" class="comment_input" required="required" name="alamat_tujuan">
									</div>
									
									<div class="form-group">
										<div class="form_title">Jam Keberangkatan</div>
										<input type="time" class="comment_input" required="required" name="jam_keberangkatan">
									</div>

									<div class="form-group">
										<div class="form_title">Penanggung Jawab</div>
										<input type="text" class="comment_input" required="required" name="penanggung_jawab">
									</div>

									<div class="form-group">
										<div class="form_title">Nomor Yang Bisa Di Hubungi</div>
										<input type="text" class="comment_input" required="required" name="no_hp">
									</div>

									<!-- <div class="form-group"> -->
										<!-- <div class="form_title">Nama Sopir</div>
										<select class="form-control" name="nama_sopir" >
										
											<?php if($datasopir == NULL) : ?>
												<option>--Sopir Belum Tersedia--</option>
											<?php endif;?>
											<?php foreach($datasopir as $sopir) :?>
											<option value="<?=$sopir->nama_sopir;?>"><?=$sopir->nama_sopir;?></option>
											<?php endforeach; ?>
										</select> -->
										<!-- <input type="text" class="comment_input" required="required"> -->
									<!-- </div> -->

									<div>
										<input type="hidden" class="comment_input"  value="<?php echo $datakendaraan->kode_kendaraan;?>" name="kode_kendaraan">
									</div>

									<div>
										<button type="submit" class="comment_button trans_200">Booking</button>
									</div>

			
						</div>
					</div>

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