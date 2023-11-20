<?php  ?>
<div id="banner-home">
	<div class="slider-home">
		<?php foreach($banner->result() as $no => $banner): ?>
		<div>
			<img src="<?= base_url('asset/backend/upload/banner/'.$banner->foto_banner);?>" alt="">
			<figcaption>
				<div class="container">
					<a href="<?= $banner->url;?>" target="_blank" class="is-size-3-mobile is-size-3-tablet is-size-3-desktop  has-text-white-bis has-text-weight-bold is-capitalized"><?= $banner->judul_banner;?></a>
					<p class="is-size-4-tablet is-size-5-mobile is-size-4-desktop has-text-white-bis"><?= strip_tags($banner->text_banner);?></p>
					<?php if ($banner->url != ''): ?>
						<a href="<?= $banner->url;?>" target="_blank" class="button is-link is-outlined">Lihat</a>
					<?php endif ?>
				</div> 
			</figcaption>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="slider-button">
		<a href="#info-prodi">
			<span class="icon is-large has-text-grey-light">
				<i class="fas fa-2x fa-chevron-down"></i>
			</span>
		</a>
	</div>
</div>

<section id="info-prodi" class="section">
	<div class="container" >
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile" data-aos="fade-right" data-aos-duration="1500">
			<div class="column is-10-mobile-xs is-8-mobile is-5-tablet is-4-desktop">
				<img src="<?= base_url('asset/backend/upload/overview/'.$logo->foto_overview);?>" alt="" class="logo-prodi">
			</div>
			<div class="column is-12-mobile-xs is-12-mobile is-7-tablet is-8-desktop wrap-prodi">
				<p class="tilte is-size-5 has-text-grey has-text-weight-light">Program Studi</p>
				<h1 class="subtitle is-size-2-mobile is-size-2-tablet is-size-1-desktop has-text-weight-bold">Informatika</h1>
				<p class="is-size-5 has-text-justified has-text-weight-normal">
					<?= $logo->text_overview;?>
				</p>
				<a href="<?= site_url('beranda/overview');?>" class="button is-outlined is-link">Info lanjut</a>
			</div>
		</div>
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile wrap-info" data-aos="fade-up" data-aos-duration="1500">
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-team"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('beranda/calonmahasiswa');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">Calon Mahasiswa</h3>
							<p class="subtitle is-size-6">Informasi untuk para calon mahasiswa .</p>
						</a>
					</div>
				</div>
			</div>
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-diploma"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('beranda/beasiswa');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">Beasiswa</h3>
							<p class="subtitle is-size-6">Berbagai informasi beasiswa bagi para mahasiswa.</p>
						</a>
					</div>
				</div>
			</div>
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-award"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('kemahasiswaan/prestasi_mahasiswa');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">Prestasi</h3>
							<p class="subtitle is-size-6">Informasi mengenai prestasi-prestasi yang telah dicapai.</p>
						</a>
					</div>
				</div>
			</div>
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-test"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('akademik/profile_lulusan');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">Profile Lulusan</h3>
							<p class="subtitle is-size-6">Prospek lulusan setelah menyelesaikan perkuliahan.</p>
						</a>
					</div>
				</div>
			</div>
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-cap"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('kemahasiswaan/alumni');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">Alumni</h3>
							<p class="subtitle is-size-6">Jejak para alumni setelah lulus perkuliahan.</p>
						</a>
					</div>
				</div>
			</div>
			<div class="column is-12-mobile-xs is-9-mobile is-6-tablet is-4-desktop item-info">
				<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-4-mobile is-4-tablet is-3-desktop has-text-centered">
						<span class="icon-conversation"></span>
					</div>
					<div class="column is-8-mobile is-8-tablet is-9-desktop">
						<a href="<?= site_url('beranda/faq');?>">
							<h3 class="title is-size-4-touch is-size-5-desktop">FAQ</h3>
							<p class="subtitle is-size-6">Menjelaskan hal - hal yang masih belum jelas.</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="bidang-minat" class="section">
	<div class="container">
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile" data-aos="fade-bottom" data-aos-duration="2000">
			<div class="column is-12-touch is-hidden-desktop" data-aos="fade-right" data-aos-duration="1500">
				<h1 class="title is-size-3-mobile">Bidang minat</h1>
				<p class="subtitle is-size-5 has-text-justified">Bermacam fokusan ilmu yang ditujukan kepada para mahasiswa program studi informatika</p>
			</div>
			<div class="column is-12-mobile is-11-tablet is-8-desktop wrap-bidang" data-aos="fade-right" data-aos-duration="1500">
				<div class="slider-minat">
					<?php foreach($bidangminat->result() as $no => $bidangminat): ?>
					<div class="item-minat">
						<figure>
							<img src="<?= base_url('asset/backend/upload/bidangminat/'.$bidangminat->foto_bidangminat);?>" alt="">
							<figcaption>
								<a href="<?= site_url('beranda/bidangminat/detail/'.$bidangminat->slug_bidangminat);?>" class="is-capitalized is-size-4-touch is-size-5-desktop has-text-weight-semibold"><?= $bidangminat->nama_bidangminat;?></a>
								<span class="is-size-6-desktop">
									<?php if (strlen($bidangminat->text_bidangminat) > 234) {
										echo substr($bidangminat->text_bidangminat, 0,234)."..";
									}else{ 
										echo $bidangminat->text_bidangminat;
									}?>
								</span>
							</figcaption>
						</figure>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="column is-4 is-hidden-touch" data-aos="fade-right" data-aos-duration="1000">
				<h1 class="title">Bidang Minat</h1>
				<p class="subtitle is-size-5 has-text-justified">Bermacam fokusan ilmu yang ditujukan kepada para mahasiswa program studi informatika</p>
			</div>
		</div>
	</div>
</section>
<section id="testimoni" class="section">
	<div class="container">
		<div class="has-text-centered">
			<h1 class="title" data-aos="zoom-in" data-aos-duration="1000">Apa kata mereka ?</h1>
		</div>
		<div class="slider-testi">
			<?php foreach($testimoni->result() as $no => $testimoni): ?>
			<div class="wrap-testi" data-aos="zoom-in" data-aos-duration="1000">
				<figure class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
					<div class="column is-narrow img-testi">
						<img src="<?= base_url('asset/backend/upload/testimoni/'.$testimoni->foto_testimoni);?>" alt="">
					</div>	
					<figcaption class="column is-12-mobile">
						<img src="<?= base_url('asset/frontend/');?>img/petik.png" alt="" class="petik-testi">
						<p class="is-size-5">
							<?= strip_tags($testimoni->testimoni);?>
						</p>
						<h2 class="title is-size-4 has-text-weight-bold has-text-right has-text-link"><?= $testimoni->nama;?></h2>
						<h2 class="subtitle is-size-5-mobile is-size-6-desktop has-text-weight-semibold has-text-right has-text-grey-light"><?= $testimoni->posisi;?></h2>
					</figcaption>
				</figure>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section id="statistik" class="section">
	<div class="container">
		<h1 class="title has-text-white-bis" data-aos="fade-up" data-aos-duration="1000">Data Informatika</h1>
		<div class="subtitle is-size-6-desktop is-size-5-mobile has-text-light" data-aos="fade-up" data-aos-duration="1000">
			<p>Jumlah data dalam angka statistik terkait program studi informatika.</p>
		</div>
		<div class="columns is-multiline is-desktop is-tablet is-mobile">
			<div class="column" data-aos="fade-up" data-aos-duration="1000">
				<a href="<?= site_url('beranda/overview');?>" class="button has-text-white-bis is-size-6 is-uppercase has-text-weight-bold">Data Umum<span class="icon"><i class="fas fa-chevron-right"></i></span></a>
				<div class="columns is-multiline is-desktop is-tablet is-mobile has-text-centered">
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-4-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">Bidang Minat</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $jumlah_bidangminat;?></h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-2-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">Dosen</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $jumlah_dosen;?></h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">Mahasiswa</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $jumlah_mahasiswa->jumlah_mahasiswa;?></h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">Lulusan</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $jumlah_alumni;?></h1>
					</div>
				</div>
			</div>
			<div class="column" data-aos="fade-up" data-aos-duration="1000">
				<a href="<?= site_url('beranda/keketatan');?>" class="button has-text-white-bis is-size-6 is-uppercase has-text-weight-bold">Data Keketatan<span class="icon"><i class="fas fa-chevron-right"></i></span></a>
				<div class="columns is-multiline is-desktop is-tablet is-mobile has-text-centered">
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">SNMPTN</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $k_snm;?>%</h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">SBMPTN</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $k_sbm;?>%</h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">Mandiri</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $k_mandiri;?>%</h1>
					</div>
					<div class="column is-6-mobile-xs is-6-mobile is-4-tablet is-3-desktop">
						<p class="subtitle is-capitalized judul-data is-size-5">UTBK</p>
						<h1 class="title is-size-3-desktop is-size-2-mobile has-text-weight-bold has-text-white-bis hasil-data"><?= $utbk;?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="read" class="section">
	<div class="container">
		<div class="columns">
			<div id="berita" class="column is-8" data-aos="fade-down" data-aos-duration="1000">

				<h1 class="title "><a class="has-text-dark" href="<?= site_url('berita');?>">Berita</a></h1>
				<div class="columns is-multiline is-centered is-tablet is-mobile">
					<?php if($berita->num_rows() != 0): ?>
					<?php foreach($berita->result() as $no => $berita): ?>
					<div class="item-berita column is-12-mobile-xs is-6-mobile is-6-tablet">
						<a href="<?= site_url('berita/detail/'.$berita->slug_berita);?>">
							<figure>
								<img src="<?= base_url('asset/backend/upload/berita/'.$berita->foto_berita);?>" alt="">
								<figcaption>
									<p class="subtitle is-size-6 has-text-weight-semibold">
										<?= $berita->nama_kategori;?>
									</p>
									<div>
										<p class="subtitle is-size-6 has-text-weight-semibold">
											<?= tgl_lengkap($berita->tanggal_berita);?>
										</p>
										<h2 class="title is-size-4-mobile is-size-5-tablet is-size-4-desktop has-text-weight-bold">
											<!-- <?= $berita->judul_berita;?> -->
											<?php if (strlen($berita->judul_berita) > 46) {
												echo substr($berita->judul_berita, 0,46)."..";
											}else{ 
												echo $berita->judul_berita;
											}?>		
										</h2>
									</div>
								</figcaption>
							</figure>
						</a>
					</div>
					<?php endforeach; ?>
					<?php else: ?>
					<p>Tidak ada data berita!</p>
					<?php endif; ?>
				</div>
			</div>
			<div id="pengumuman-kegiatan" class="column" data-aos="fade-down" data-aos-duration="1000">
				<h1 class="title ">
					<a class="has-text-dark" href="<?= site_url('beranda/pengumuman');?>">Pengumuman</a>
				</h1>
				<?php if($pengumuman->num_rows() == 0): ?>
				<p class="has-text-centered">Tidak ada data pengumuman!</p>
				<?php else: ?>
				<div class="columns is-multiline">
					<?php foreach($pengumuman->result() as $no => $pengumuman): ?>
					<div class="column is-12">
						<a href="<?= site_url('beranda/pengumuman/detail/'.$pengumuman->slug_pengumuman);?>">
							<p class="has-text-dark is-size-6 has-text-justified">
								<?php if (strlen($pengumuman->judul_pengumuman) > 80) {
									echo substr($pengumuman->judul_pengumuman, 0,80)."..";
								}else{ 
									echo $pengumuman->judul_pengumuman;
								}?>		
							</p>
							<span><?= tgl_lengkap($pengumuman->tgl_pengumuman);?></span>
						</a>
					</div>
					<?php endforeach;?>
				</div>
				<?php endif; ?>

				<h1 class="title ">
					<a class="has-text-dark" href="<?= site_url('beranda/kegiatan');?>">Kegiatan</a>
				</h1>
				<?php if($kegiatan->num_rows() == 0): ?>
				<p class="has-text-centered">Tidak ada data kegiatan!</p>
				<?php else: ?>
					<div class="columns is-multiline">	
						<?php foreach($kegiatan->result() as $no => $kegiatan): ?>
						<div class="column is-12">
							<a href="<?= site_url('beranda/kegiatan/detail/'.$kegiatan->slug_kegiatan);?>">
								<p class="has-text-dark is-size-6 has-text-justified">
									<?php if (strlen($kegiatan->judul_kegiatan) > 80) {
										echo substr($kegiatan->judul_kegiatan, 0,80)."..";
									}else{ 
										echo $kegiatan->judul_kegiatan;
									}?>	
								</p>
								<span><?= tgl_lengkap($kegiatan->tgl_kegiatan);?></span>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>