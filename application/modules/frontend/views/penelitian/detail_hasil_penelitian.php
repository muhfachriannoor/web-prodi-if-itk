<?php  ?>
<div id="detail-hasil-penelitian">
		<h3 class="is-size-3-desktop is-size-4-touch has-text-grey-dark has-text-weight-semibold "><?= $datanya->judul_penelitian;?></h3>
		<div class="detail-widget">
			<span class="has-text-grey">
				<i class="fas fa-clock"></i>
				<?= $datanya->tahun_penelitian;?> 
				- 
				<i class="fas fa-coins"></i>
				<?= $datanya->sumberdana_penelitian;?>
			</span>
		</div>
	<div class="content">		
		<?php if($datanya->foto_penelitian != ''): ?>
 			<img src="<?= base_url('asset/backend/upload/hasil_penelitian/'.$datanya->foto_penelitian);?>" alt="">
 		<?php else: ?>
 			<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
 		<?php endif; ?>
		<div class="deskripsi-hasil-penelitian has-text-justified">
			<?= $datanya->text_penelitian;?>
		</div>
	</div>
</div>