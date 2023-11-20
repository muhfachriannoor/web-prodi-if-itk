<?php if($laboratorium->num_rows() != 0): ?>
<div id="laboratorium" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Laboratorium</h3>
	<p class="has-text-grey">Ruangan laboratoium yang digunakan oleh mahasiswa(i) program studi informatika.</p>
	<br>	
	<?php foreach($laboratorium->result() as $no => $laboratorium): ?>
	<figure>
		<h4 class="title is-capitalized is-size-4-desktop is-size-4-tablet is-size-5-mobile has-text-grey-dark has-text-left"><?= $laboratorium->nama_laboratorium;?></h4>
		<?php if($laboratorium->laboratorium_file != ''): ?>
			<img src="<?= base_url('asset/backend/upload/laboratorium/'.$laboratorium->laboratorium_file);?>" alt="" width="550">
		<?php else: ?>
			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" width="550">
		<?php endif; ?>
		<figcaption class="has-text-grey">
			<?= $laboratorium->laboratorium_text;?>
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