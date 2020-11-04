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
<?php echo validation_errors('<div class="alert-warning">','</div>');?>

		<!-- Contact Info -->

		<div class=""><br>
			<div class="container">
				<div class="row">

					<div class="col-lg-12 text-center">
					<h3> My Profile </h3><br>
					</div>

			<div class="col-lg-12">
						<?php echo form_open_multipart('home/editProfile/'); ?>
				<br>
						<div class="contact_form">
							
								<div class="form-group">
									<div class="form_title">Username</div>
									<input type="text" class="comment_input" name="username" required="required"  value="<?=$userdata->username?>">
								</div>
								<div class="form-group">
									<div class="form_title">Nama</div>
									<input type="text" class="comment_input" required="required" name="nama" value="<?=$userdata->nama?>">
								</div>
								<div class="form-group">
									<div class="form_title">Kontak</div>
									<input type="text" class="comment_input" required="required" name="kontak" value="<?=$userdata->kontak?>">
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