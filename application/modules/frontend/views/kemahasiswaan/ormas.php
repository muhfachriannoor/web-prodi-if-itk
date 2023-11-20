<?php if($ormas->num_rows() != 0): ?>
<div id="organisasi-mahasiswa">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Organisasi Kemahasiswaan</h3>
	<p class="has-text-grey">Komunitas studi dan pengembangan minat dan bakat, antara lain:</p>
	<br>
	<?php foreach($ormas->result() as $no => $ormas): ?>
	<figure>
		<h4 class="title is-capitalized is-size-4 has-text-grey-dark"><?= $ormas->nama_ormas;?></h4>
		<?php if($ormas->foto_ormas != ''): ?>
			<img src="<?= base_url('asset/backend/upload/ormas/'.$ormas->foto_ormas);?>" alt="" width="450">
		<?php else: ?>
			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" width="450">
		<?php endif; ?>
		<figcaption class="has-text-grey">
			<?= $ormas->deskripsi_ormas;?>
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