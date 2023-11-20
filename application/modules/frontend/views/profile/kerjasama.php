<?php if($kerjasama->num_rows() != 0): ?>
<div id="kerjasama" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Kerjasama</h3>
	<p class="has-text-grey">Program studi informatika aktif dalam kerjasama. </p>
	<br>
	<?php foreach($kerjasama->result() as $no => $kerjasama): ?>
	<figure>
		<h4 class="title is-capitalized is-size-4 has-text-grey-dark"><?= $kerjasama->nama_kerjasama;?></h4>
		<?php if($kerjasama->file_kerjasama != ''): ?>
			<img src="<?= base_url('asset/backend/upload/kerjasama/'.$kerjasama->file_kerjasama);?>" alt="" width="450">
		<?php else: ?>
			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" width="450">
		<?php endif; ?>
		<figcaption class="has-text-grey">
			<?= strip_tags($kerjasama->deskripsi_kerjasama);?>
		</figcaption>
	</figure>
	<?php endforeach; ?>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>