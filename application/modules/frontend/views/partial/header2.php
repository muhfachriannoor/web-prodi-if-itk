<?php 
	if($menunya == 'Beranda' || $menunya == 'Berita' || $menunya == 'Kontak') { 
?>
<section id="banner" class="section">
	<div class="container">
		<h3 class="is-size-3-desktop is-size-4-touch has-text-weight-bold has-text-white-bis"><?= $menunya;?></h3>
		<nav class="breadcrumb has-text-white-bis" aria-label="breadcrumbs">
		  <ul>
		    <li><a href="#">Beranda</a></li>
		    <li class="is-active"><a href="#" aria-current="page"><?= ($sub_menunya == '') ? $title : $sub_menunya;?></a></li>
		  </ul>
		</nav>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns is-desktop is-tablet is-mobile is-multiline">
			<div class="column is-3-desktop is-4-tablet is-12-mobile">
				<aside class="menu">
					<?php if($menunya != 'Kontak'): ?>
					<p class="menu-label">Kategori</p>
					<ul class="menu-list">
						<li><a href="<?= site_url('beranda/pengumuman');?>" <?= ($sub_menunya == 'Pengumuman') ? 'class="is-active"' : '';?>>Pengumuman</a></li>
						<li><a href="<?= site_url('berita');?>" <?= ($sub_menunya == 'Berita') ? 'class="is-active"' : '';?>>Berita</a></li>
						<li><a href="<?= site_url('beranda/kegiatan');?>" <?= ($sub_menunya == 'Kegiatan') ? 'class="is-active"' : '';?>>Kegiatan</a></li>
					</ul>
					<?php endif; ?>
					<p class="menu-label">Aksi Cepat</p>
					<ul class="menu-list sekilas is-capitalized">
						<li><a href="<?= site_url('beranda/overview');?>" <?= ($title == 'Overview') ? 'class="is-active"' : '';?>><span class="icon-computer"></span> sekilas iF</a></li>
						<li><a href="<?= site_url('beranda/calonmahasiswa');?>" <?= ($title == 'Calon Mahasiswa') ? 'class="is-active"' : '';?>><span class="icon-team"></span> calon mahasiswa</a></li>
						<li><a href="<?= site_url('beranda/beasiswa');?>" <?= ($title == 'Beasiswa') ? 'class="is-active"' : '';?>><span class="icon-diploma"></span> beasiswa</a></li>
						<li><a href="<?= site_url('kemahasiswaan/prestasi_mahasiswa');?>" <?= ($title == 'Prestasi Mahasiswa') ? 'class="is-active"' : '';?>><span class="icon-award"></span> prestasi</a></li>
						<li><a href="<?= site_url('akademik/profile_lulusan');?>" <?= ($title == 'Profile Lulusan') ? 'class="is-active"' : '';?>><span class="icon-test"></span> profile lulusan</a></li>
						<li><a href="<?= site_url('kemahasiswaan/alumni');?>" <?= ($title == 'Alumni') ? 'class="is-active"' : '';?>><span class="icon-cap"></span> alumni</a></li>
						<li><a href="<?= site_url('beranda/faq');?>" <?= ($title == 'FAQ') ? 'class="is-active"' : '';?>><span class="icon-conversation"></span> faq</a></li>
					</ul>
				</aside>
			</div>
			<div class="column">
<?php }else{ ?>
<section id="banner" class="section">
	<div class="container">
		<h3 class="is-size-3-desktop is-size-4-touch has-text-weight-bold has-text-white-bis"><?= $menunya;?></h3>
		<nav class="breadcrumb has-text-white-bis" aria-label="breadcrumbs">
		  <ul>
		    <li><a href="#">Beranda</a></li>
		    <li><a href="#"><?= $menunya;?></a></li>
		    <li class="is-active"><a href="#" aria-current="page"><?= $sub_menunya?></a></li>
		  </ul>
		</nav>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="columns is-desktop is-tablet is-mobile is-multiline">
			<div class="column is-3-desktop is-4-tablet is-12-mobile">
				<aside class="menu">

					<p class="menu-label"><?= $menunya;?></p>
					<ul class="menu-list">
						<?php
							$id_menunya2 = $id_menunya->idMenu;
							$sub_menu = $this->db->get_where('submenu',array('idMenu' => $id_menunya2));
							foreach($sub_menu->result() as $no => $sub_menu_tampil):
						?>
						<li>
							<a href="<?= site_url($sub_menu_tampil->url);?>" <?= ($sub_menu_tampil->nameSubmenu == $sub_menunya) ? 'class="is-active"' : '';?>>
								<?= $sub_menu_tampil->nameSubmenu;?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					<p class="menu-label">Aksi Cepat</p>
					<ul class="menu-list sekilas is-capitalized">
						<li><a href="<?= site_url('beranda/overview');?>" <?= ($title == 'Overview') ? 'class="is-active"' : '';?>><span class="icon-computer"></span> sekilas iF</a></li>
						<li><a href="<?= site_url('beranda/calonmahasiswa');?>" <?= ($title == 'Calon Mahasiswa') ? 'class="is-active"' : '';?>><span class="icon-team"></span> calon mahasiswa</a></li>
						<li><a href="<?= site_url('beranda/beasiswa');?>" <?= ($title == 'Beasiswa') ? 'class="is-active"' : '';?>><span class="icon-diploma"></span> beasiswa</a></li>
						<li><a href="<?= site_url('kemahasiswaan/prestasi_mahasiswa');?>" <?= ($title == 'Prestasi Mahasiswa') ? 'class="is-active"' : '';?>><span class="icon-award"></span> prestasi</a></li>
						<li><a href="<?= site_url('akademik/profile_lulusan');?>" <?= ($title == 'Profile Lulusan') ? 'class="is-active"' : '';?>><span class="icon-test"></span> profile lulusan</a></li>
						<li><a href="<?= site_url('kemahasiswaan/alumni');?>" <?= ($title == 'Alumni') ? 'class="is-active"' : '';?>><span class="icon-cap"></span> alumni</a></li>
						<li><a href="<?= site_url('beranda/faq');?>" <?= ($title == 'FAQ') ? 'class="is-active"' : '';?>><span class="icon-conversation"></span> faq</a></li>
					</ul>
				</aside>
			</div>
			<div class="column">
<?php } ?>