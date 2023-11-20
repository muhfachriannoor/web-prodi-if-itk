<?php  ?>
<div id="beasiswa-detail">
	<h3 class="is-size-3-desktop is-size-4-touch has-text-weight-semibold has-text-grey-dark"><?= $datanya->nama_beasiswa;?></h3>
	<div class="detail-widget">
		<span class="has-text-grey">
			<i class="far fa-calendar-alt"></i>
			<?= tgl_lengkap($datanya->tanggal_beasiswa);?>
		</span>
	</div>
	<div class="content">
		<p class="has-text-centered">
			<a class="img-modals" data-target="#detail-kegiatan">
				<?php if($datanya->foto_beasiswa != ''): ?>	
			 		<img src="<?= base_url('asset/backend/upload/beasiswa/'.$datanya->foto_beasiswa);?>" alt="" class="img-poster">
			 	<?php else: ?>
			 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-poster">
			 	<?php endif; ?>
			</a>
			<div class="modal" id="detail-kegiatan">
			  <div class="modal-background"></div>
			  <div class="modal-content">
			    <p class="image ">
			    	<?php if($datanya->foto_beasiswa != ''): ?>	
				 		<img src="<?= base_url('asset/backend/upload/beasiswa/'.$datanya->foto_beasiswa);?>" alt="">
				 	<?php else: ?>
				 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
			 		<?php endif; ?>
			    </p>
			  </div>
			  <button class="modal-close is-large" aria-label="close"></button>
			</div>
		</p>
		<div class="has-text-justified">
			<?= $datanya->text_beasiswa;?>
		</div>
	</div>
</div>