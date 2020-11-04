<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Profile</li>
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
					<h3> My Profile </h3><br>
					</div>

			<div class="col-lg-12">
				<?php echo validation_errors('<div class="alert-warning">','</div>');?>
			
				<br>
						<?php echo form_open_multipart('home/editPassword/'); ?>
						<div class="contact_form">
							
								<div class="form-group">
									<div class="form_title">Password Lama</div>
									<input type="password" class="comment_input" required="required" name="old_password" value="">
								</div>
								<div class="form-group">
									<div class="form_title">Password baru</div>
									<input type="password" class="comment_input" required="required" name="new_password" value="">
								</div>
								<div class="form-group">
									<div class="form_title">Konfirmasi Password Baru</div>
									<input type="password" class="comment_input" required="required" name="confirm_password" value="">
								</div>
									<input type="hidden" class="comment_input" required="required" name="id_user" value="<?=$userdata->id_user?>">

								<div class="text-center mt-3">
									<button type="submit" class="btn btn-m btn-warning" >Simpan</button>
									<a href="<?=base_url('home/profile')?>" class="btn btn-m btn-danger">Batal</a>
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

	