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
					<h3> Edit Tanggal Kembali </h3><br>
					</div>
				
					<div class=" w-100 contact_form">
					<?php echo form_open_multipart('home/editKembali/' . $databooking->kode_booking); ?>

						<div class="mb-3">
							<button type="submit" class="btn btn-m btn-primary">Edit</button>
							<a href="<?=base_url('home/bukti')?>" class="btn btn-m btn-danger">Batal</a>
						</div>
						<div class="form-group">
							<div class="form_title">Tanggal Kembali</div>
							<input type="date" class="comment_input form-control" required="required" name="tanggal_kembali" value="<?=$databooking->tanggal_kembali?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  

<!-- Newsletter -->

	<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>