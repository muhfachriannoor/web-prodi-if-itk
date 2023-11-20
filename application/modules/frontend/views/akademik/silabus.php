<?php if($silabus != ''): ?>
<div id="silabus">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Silabus</h3>
	<p class="has-text-grey has-text-justified">Rencana pembelajaran terkait program studi Informatika.</p>
	<br>
	<div class="columns wrap-download is-multiline is-desktop is-tablet is-mobile">
		<div class="column is-3-mobile-xs is-2-mobile is-2-tablet is-2-desktop">
			<img src="<?= base_url('asset/frontend/');?>img/pdf3s.png" alt="">
		</div>
		<div class="column is-9-mobile-xs is-7-mobile is-8-tablet is-8-desktop">
			<p><?= $silabus->file_silabus;?></p>
			<br>
			<div class="has-text-weight-light">
				<p class="has-text-grey">Jadwal rilis <b class="has-text-success"><?= tgl_lengkap($silabus->tglrilis_silabus);?></b ></p>
			</div>
		</div>
		<a href="<?= base_url('asset/backend/upload/silabus/'.$silabus->file_silabus);?>" target="_blank" class="column is-12-mobile-xs is-3-mobile is-2-tablet is-2-desktop has-background-success">
			<span class="icon is-large has-text-grey-dark">
				<i class="fas fa-3x fa-download"></i>
			</span>
			<b class="has-text-grey-dark"><?= ukuran_file($silabus->ukuran_file);?></b>
		</a>
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>