<?php  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informatika | <?= $title;?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('asset/frontend/img/logo.png');?>">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/bulma.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/design.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/aos-master/dist/aos.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/font-awesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/font-awesome/css/brands.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>css/icomoon/style.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>js/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url('asset/frontend/');?>js/slick/slick-theme.css">
  </head>
  <body>
  	<div id="wrap">
	  	<nav class="navbar <?= ($title != 'Beranda' OR $title == 'Overview' OR $title == 'Calon Mahasiswa' OR $title == 'Beasiswa' OR $title == 'FAQ' OR $title == 'Pengumuman' OR $title == 'Kegiatan') ? 'nav-2 nav-color' : '';?>">
	  		<div class="container">
				<div class="navbar-brand">
					<a href="#" class="navbar-item">
    					<img class="navbar-logo" src="<?= base_url('asset/frontend/');?>img/if-nav.png" alt="">
 					</a>
					<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
				      <span aria-hidden="true"></span>
				      <span aria-hidden="true"></span>
				      <span aria-hidden="true"></span>
				    </a>
				</div>
				<div class="navbar-menu is-capitalized has-text-weight-semibold" id="navMenu">
					<?php
						$query = $this->db->get('menu');
			        	foreach($query->result() as $row):
			        		$id_menu 	= $row->idMenu;
			        		$sub_menu 	= $this->db->get_where('submenu',array('idMenu' => $id_menu));
			        		if($row->nameMenu == 'Beranda' || $row->nameMenu == 'Berita' || $row->nameMenu == 'Kontak'):
					?>
								<?php if($row->nameMenu == 'Beranda') { ?>
									<a href="<?= site_url('beranda');?>" class="navbar-item <?= ($menunya == 'Beranda') ? 'actived' : '';?>"><?= $row->nameMenu;?></a>
								<?php }elseif($row->nameMenu == 'Berita') { ?>
									<a href="<?= site_url('berita');?>" class="navbar-item <?= ($menunya == 'Berita') ? 'actived' : '';?>"><?= $row->nameMenu;?></a>
								<?php }else{ ?>
									<a href="<?= site_url('kontak');?>" class="navbar-item <?= ($menunya == 'Kontak') ? 'actived' : '';?>"><?= $row->nameMenu;?></a>
								<?php } ?>
							<?php else: ?>
								<div class="navbar-item has-dropdown is-hoverable <?= ($row->nameMenu == $menunya) ? 'actived' : '';?>">
					    			<a class="navbar-link"><?= $row->nameMenu;?></a>
									<div class="navbar-dropdown is-boxed has-text-weight-normal">
					    			<?php foreach($sub_menu->result() as $row2): ?>
					      				<a href="<?= site_url($row2->url);?>" class="navbar-item"><?= $row2->nameSubmenu;?></a>
									<?php endforeach; ?>
					    			</div>
								</div>
							<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</nav>
		<main>