<?php if($struktur_organisasi != ''): ?>
<div id="struktur-organisasi">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Struktur Organisasi</h3>
	<div class="content">
		<p class="has-text-grey has-text-justified">
			Struktur organisasi Program Studi Informatika adalah seperti gambar berikut. Struktur Organisasi ini terdiri dari Koordinator Program Studi, Tenaga Kependidikan, dan Koordinator lainnya.
		</p>
	</div>
	<div class="has-text-centered">
		<img src="<?= base_url('asset/backend/upload/struktur_organisasi/'.$struktur_organisasi->struktur_file);?>" alt="" width="100%">
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>