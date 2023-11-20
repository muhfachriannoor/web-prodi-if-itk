<?php if($sejarah != ''): ?>
<div id="sejarah" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Sejarah</h3>
	<span class="has-text-grey">
			<?= $sejarah->sejarah_text;?>
	</span>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>