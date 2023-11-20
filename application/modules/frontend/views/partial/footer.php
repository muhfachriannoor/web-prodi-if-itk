<?php
	$overview 	= $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->get('overview_prodi')->row();
	$kontak 	= $this->db->get('m_kontak')->row();
	$footer 	= $this->db->order_by('id_prodi','ASC')->get('prodi_lain');
?>
		</main>
	 	<footer class="footer">
	 			<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
	 				<div class="column is-8-mobile-xs is-5-mobile is-3-tablet is-2-desktop has-text-centered">
						<img src="<?= base_url('asset/backend/upload/overview/'.$overview->foto_overview);?>" alt="">
	 					<p class="is-size-4-mobile is-size-5-tablet is-size-5-desktop is-size-4-widescreen has-text-weight-bold is-uppercase">Informatika</p>
	 					<div class="has-text-centered">
	 						<p class="is-size-6 has-text-weight-light has-text-white-bis">social media</p>
	 						<?php if($kontak->facebook != ''): ?>
		 					<a href="<?= $kontak->facebook;?>" target="_blank">
	 							<span class="icon has-text-link"><i class="fab fa-facebook-f"></i></span>
		 					</a>
		 					<?php endif; ?>
		 					<?php if($kontak->twitter != ''): ?>
		 					<a href="<?= $kontak->twitter;?>" target="_blank">
	 							<span class="icon has-text-link"><i class="fab fa-twitter"></i></span>
		 					</a>
		 					<?php endif; ?>
		 					<?php if($kontak->youtube != ''): ?>
		 					<a href="<?= $kontak->youtube;?>" target="_blank">
	 							<span class="icon has-text-link"><i class="fab fa-youtube"></i></span>
		 					</a>
		 					<?php endif; ?>
		 					<?php if($kontak->instagram != ''): ?>
		 					<a href="<?= $kontak->instagram;?>" target="_blank">
	 							<span class="icon has-text-link"><i class="fab fa-instagram"></i></span>
		 					</a>
		 					<?php endif; ?>
	 					</div>
	 				</div>
	 				<div class="column is-12-mobile-xs is-7-mobile is-4-tablet is-3-desktop has-text-weight-light ">
	 					<h2 class="title is-size-4-mobile is-size-5-tablet is-size-5-desktop is-size-4-widescreen has-text-white-bis"><?= $overview->jurusan;?></h2>
						<p>	Institut Teknologi Kalimantan </p>
						<p><?= $kontak->alamat;?></p>
						<br>
						<p>Telp <?= $kontak->telpon;?></p>
						<p>Email <?= $kontak->email;?></p>
	 				</div>
	 				<div class="column is-12-mobile is-5-tablet is-6-desktop is-offset-1-desktop prodi">
	 					<h2 class="title is-size-4-mobile is-size-5-tablet is-size-5-desktop is-size-4-widescreen has-text-white-bis">Program Studi</h2>
	 					<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile has-text-weight-light no-prodi">
	 						<?php
	 							$cek 		= $footer->num_rows();
	 							$bagi 		= $cek / 2;
	 							$bulatkan 	= ceil($bagi);
	 							$first 		= $this->db->order_by('nomor_prodi','ASC')->get('prodi_lain', $bulatkan, 0);
	 							$second 	= $this->db->order_by('nomor_prodi','ASC')->get('prodi_lain', $bulatkan, $bulatkan)
	 						?>
	 						<div class="column is-6">
	 							<?php foreach($first->result() as $no => $first): ?>
			 					<a href="<?= $first->url_prodi;?>" target="_blank" class="is-size-6 has-text-white-bis"><p><b><?= $first->nomor_prodi?></b><?= $first->nama_prodi;?></p></a>
			 					<?php endforeach; ?>
	 						</div>
	 						<div class="column is-6">
			 					<?php foreach($second->result() as $no => $second):
			 					?>
			 					<a href="<?= $second->url_prodi;?>" target="_blank" class="is-size-6 has-text-white-bis"><p><b><?= $second->nomor_prodi;?></b><?= $second->nama_prodi;?></p></a>
			 					<?php endforeach; ?>
	 						</div>
	 					</div>
	 				</div>
	 				<div class="column is-narrow wrap-itk">
	 					<a href="https://itk.ac.id/" target="_blank">
	 						<img src="<?= base_url('asset/frontend/');?>img/logo-itk.png" alt="" class="logo-itk">
	 						<p>www.itk.ac.id</p>
	 					</a>
	 					<div class="has-text-centered">
	 						<span class="icon is-small has-text-link">
	 							<i class="far fa-envelope"></i>
	 						</span>
	 						<span class="has-text-white-bis">
	 							humas@itk.ac.id
	 						</span>	
	 						<span> - </span>
	 						<span class="icon is-small has-text-link">
	 							<i class="fas fa-phone-alt"></i>
	 						</span>
	 						<span class="has-text-white-bis">
	 							0542-8530801
	 						</span>	
	 					</div>
	 				</div>
	 			</div>
	 			<p class="copyright has-text-centered">© Informatika -  Institut Teknologi Kalimantan 2019 </p>
		</footer>
		<div id="google_translate_element"></div>
	</div>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>css/font-awesome/js/brands.js"></script>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>js/main.js"></script>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>js/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>css/aos-master/dist/aos.js"></script>
	<script type="text/javascript" src="<?= base_url('asset/frontend/');?>js/jquery.js"></script>
	<script type="text/javascript">
		function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: 'id',includedLanguages:'en,id',layout: google.translate.TranslateElement.InlineLayout.SIMPLE,multilanguagePage:true}, 'google_translate_element');
		}
	  	AOS.init();
	</script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </body>
</html>