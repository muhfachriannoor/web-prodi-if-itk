<?php ?>
<div id="detail-berita">
	<h3 class="is-size-3-desktop is-size-4-touch has-text-grey-dark has-text-weight-semibold "><?= $datanya->judul_berita;?></h3>
	<div class="detail-widget">
		<span class="has-text-grey">
			<i class="fas fa-tag"></i>
			<?= $datanya->nama_kategori;?>
			- 
			<i class="far fa-calendar-alt"></i>
			<?= tgl_lengkap($datanya->tanggal_berita);?>
		</span>
	</div>
	<div class="content">
		<img src="<?= base_url('asset/backend/upload/berita/'.$datanya->foto_berita);?>" alt="">
		<div class="deskripsi-berita has-text-justified">
			<?= $datanya->isi_berita;?>
		</div>
		<?php if($datanya->video_berita != ''): ?>
			<div class="video-berita">
				<span>Video Terkait :</span>
				<iframe src="<?= $datanya->video_berita;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
				</iframe>
			</div>
		<?php endif; ?>
	</div>
</div>
