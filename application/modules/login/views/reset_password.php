<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password Informatika</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('asset/frontend/img/logo.png');?>">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/login.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/bulma.css">
</head>
<body>
	<div class="login-wrap">
		<div class="wrapper">
			<div class="side-login">
				<img src="<?= base_url('asset/frontend/img/logo.png');?>" alt="">
				<p>Informatika</p>
				<span>est 2017</span>
			</div>
			<div class="login">
				<span>Institut Teknologi Kalimantan</span>
				<div>
					<h3 class="title is-size-3 has-text-weight-semibold">Reset Password</h3>
					<p class="subtitle is-size-7 has-text-grey">Buat password baru</p>
				</div>
				<div class="control">
					<form action="<?= site_url('lupa_password/reset/up/'.$token);?>" method="post">
		  				<label class="">Password Baru</label>
		  				<input class="input" type="password" name="password" placeholder="***" autofocus="autofocus">

		  				<label class="">Ulangi Password Baru</label>
		  				<input class="input" type="password" name="re_password" placeholder="***">
						<button type="submit" class="button submit is-uppercase">kirim</button>
						<!-- <a href="">lupa password ?</a> -->
					</form>
				</div>
				<p class="kembali"><a href="<?= site_url('login/');?>">< kembali</a></p>
				<?= $this->session->flashdata('alert');?>
				<?= validation_errors(); ?>
			</div>
		</div>
	</div>
</body>
</html>