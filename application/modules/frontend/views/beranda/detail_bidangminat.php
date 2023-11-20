<?php  ?>
<div id="detail-bidangminat">
	<div class="deskripsi-bidang-minat has-text-justified">
		<div class="has-text-centered-mobile">
		<img src="<?= base_url('asset/backend/upload/bidangminat/'.$datanya->foto_bidangminat);?>" alt="">
		</div>
		<div>
			<p class="title is-size-5 has-text-white-bis">Bidang Minat</p>
			<p class="subtitle is-size-3 has-text-link has-text-weight-semibold"><?= $datanya->nama_bidangminat;?></p>
		</div>
		<div>
			<?= $datanya->text_bidangminat;?>
		</div>
	</div>
</div>