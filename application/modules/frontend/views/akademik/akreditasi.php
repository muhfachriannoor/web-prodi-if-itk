<?php if($akreditasi != ''): ?>
<div id="akreditasi">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Akreditasi</h3>
	<p class="has-text-grey">
		<?= strip_tags($akreditasi->akreditasi_text);?>
	</p>
	<br>
	<div class="has-text-centered">
		<img src="<?= base_url('asset/backend/upload/akreditasi/'.$akreditasi->akreditasi_file);?>" alt="">
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>