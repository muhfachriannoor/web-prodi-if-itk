<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Informatika</title>
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
					<h3 class="title is-size-3 has-text-weight-semibold">Selamat Datang</h3>
					<p class="subtitle is-size-7 has-text-grey">login dashbord prodi Informatika</p>
				</div>
				<div class="control">
					<form action="<?= site_url('login/up');?>" method="post">
		  				<label class="">Username/Email</label>
		  				<input class="input" type="text" name="username" placeholder="Username/Email..." autofocus="autofocus">

		  				<label class="">Password</label>
		  				<input class="input" type="password" name="password" placeholder="***">
						<button type="submit" class="button submit is-uppercase">masuk</button>
						<a href="<?= site_url('lupa_password/');?>">lupa password ?</a>
					</form>
				</div>
				<?= $this->session->flashdata('alert');?>
			</div>
		</div>
	</div>
</body>
</html>