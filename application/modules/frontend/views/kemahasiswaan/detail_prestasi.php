<?php  ?>
<div id="detail-prestasi-mahasiswa">
	<h3 class="is-size-3-desktop is-size-4-touch has-text-weight-semibold">
		<span class="has-text-warning is-uppercase"><?= $datanya->peringkat_prestasi;?></span> 
		<span class="has-text-grey-dark"><?= $datanya->nama_prestasi;?></span>
	</h3>
	<div class="detail-widget">
		<span class="has-text-grey">
			<i class="fas fa-map-marker-alt"></i> 
			<?= $datanya->tempat_prestasi;?>
			-
			<i class="far fa-calendar-alt"></i>
			<?= tgl_indo($datanya->date_prestasi);?>
		</span>
	</div>
	<div class="content">
		<?php if($datanya->foto_prestasi != ''): ?>
			<img src="<?= base_url('asset/backend/upload/prestasi_mahasiswa/'.$datanya->foto_prestasi);?>" alt="">
		<?php else: ?>
			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
		<?php endif; ?>
		<div class="deskripsi-prestasi has-text-justified">
			<?= $datanya->text_prestasi;?>
		</div>
	</div>
</div>