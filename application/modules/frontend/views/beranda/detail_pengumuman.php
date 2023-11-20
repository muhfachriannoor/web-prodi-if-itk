<?php  ?>
<div id="pengumuman-detail">
	<h3 class="is-size-3-desktop is-size-4-touch  has-text-weight-semibold has-text-grey-dark"><?= $datanya->judul_pengumuman?></h3>
	<div class="detail-widget">
		<span class="  has-text-grey">
			<i class="far fa-calendar-alt"></i>
			<?= tgl_lengkap($datanya->tgl_pengumuman);?>	
		</span>
	</div>
	<div class="content">
		<p class="has-text-centered">
			<a class="img-modals" data-target="#detail-kegiatan">
				<?php if($datanya->foto_pengumuman != ''): ?>	
				 	<img src="<?= base_url('asset/backend/upload/pengumuman/'.$datanya->foto_pengumuman);?>" alt="" class="img-poster">
				 <?php else: ?>
			 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-poster">
			 	<?php endif; ?>
			</a>
			<div class="modal" id="detail-kegiatan">
			  <div class="modal-background"></div>
			  <div class="modal-content">
			    <p class="image">
			    	<?php if($datanya->foto_pengumuman != ''): ?>
				 	<img src="<?= base_url('asset/backend/upload/kegiatan/'.$datanya->foto_pengumuman);?>" alt="">
				 	<?php else: ?>
		 				<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
	 				<?php endif; ?>
			    </p>
			  </div>
			  <button class="modal-close is-large" aria-label="close"></button>
			</div>
		</p>
		<div class="has-text-justified">
			<?= $datanya->text_pengumuman;?>
		</div>
	</div>
</div>