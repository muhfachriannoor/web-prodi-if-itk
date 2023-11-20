<?php if($visimisi != ''): ?>
<div id="visimisi" class="has-text-justified">
	<div class="content has-text-grey">
		<?php if($visimisi->visi_text != ''): ?>
		<h1 class="has-text-weight-bold has-text-grey-dark">Visi</h1>
		<?= $visimisi->visi_text;?>
		<?php endif; ?>
		<?php if($visimisi->misi_text != ''): ?>
		<h1 class="has-text-weight-bold has-text-grey-dark">Misi</h1>
		<?= $visimisi->misi_text;?>
		<?php endif; ?>
		<?php if($visimisi->tujuan_text != ''): ?>
		<h1 class="has-text-weight-bold has-text-grey-dark">Tujuan</h1>
		<?= $visimisi->tujuan_text;?>
		<?php endif; ?>
		<?php if($visimisi->motto_text != ''): ?>
		<h1 class="has-text-weight-bold has-text-grey-dark">Moto</h1>
		<?= $visimisi->motto_text;?>
		<?php endif; ?>
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>