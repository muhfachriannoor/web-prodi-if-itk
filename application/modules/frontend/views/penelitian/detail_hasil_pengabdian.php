<?php  ?>
<div id="detail-hasil-pengabdian">
		<h3 class="is-size-3-desktop is-size-4-touch has-text-grey-dark has-text-weight-semibold "><?= $datanya->judul_pengabdian;?></h3>
		<div class="detail-widget">
			<span class="has-text-grey">
				<i class="fas fa-clock"></i>
				<?= $datanya->tahun_pengabdian;?> 
				- 
				<i class="fas fa-coins"></i>
				<?= $datanya->sumberdana_pengabdian;?>
			</span>
		</div>
	<div class="content">		
		<?php if($datanya->foto_pengabdian != ''): ?>
 			<img src="<?= base_url('asset/backend/upload/hasil_pengabdian/'.$datanya->foto_pengabdian);?>" alt="">
 		<?php else: ?>
 			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
 		<?php endif; ?>
		<div class="deskripsi-hasil-pengabdian has-text-justified">
			<?= $datanya->text_pengabdian;?>
		</div>
	</div>
</div>