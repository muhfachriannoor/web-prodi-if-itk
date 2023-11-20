<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lupa Password Informatika</title>
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
					<h3 class="title is-size-3 has-text-weight-semibold">Lupa Password</h3>
					<p class="subtitle is-size-7 has-text-grey">Masukkan email dengan baik dan benar</p>
				</div>
				<div class="control">
					<form action="<?= site_url('lupa_password/up');?>" method="post">
		  				<label class="">Email</label>
		  				<input class="input" type="email" name="email" placeholder="Email..." autofocus="autofocus">
						<button type="submit" class="button submit is-uppercase">kirim</button>
						<!-- <a href="">lupa password ?</a> -->
					</form>
				</div>
				<p class="kembali"><a href="<?= site_url('login/');?>">< kembali</a></p>
				<?= $this->session->flashdata('alert');?>
			</div>
		</div>
	</div>
</body>
</html>