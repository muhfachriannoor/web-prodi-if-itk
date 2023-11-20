<?php  ?>
<div id="pkm-detail" class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
	<div class="column is-10-mobile-xs is-6-touch is-6-desktop">
		<a class="img-modals" data-target="#detail-pkm">
			<?php if($datanya->foto_pkm != ''): ?>
		 		<img src="<?= base_url('asset/backend/upload/pkm/'.$datanya->foto_pkm);?>" alt="">
		 	<?php else: ?>
		 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
		 	<?php endif; ?>
		</a>
		<div class="modal" id="detail-pkm">
		  <div class="modal-background"></div>
		  <div class="modal-content">
		    <p class="image">
		    	<?php if($datanya->foto_pkm != ''): ?>
			 		<img src="<?= base_url('asset/backend/upload/pkm/'.$datanya->foto_pkm);?>" alt="">
			 	<?php else: ?>
			 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
			 	<?php endif; ?>
		    </p>
		  </div>
		  <button class="modal-close is-large" aria-label="close"></button>
		</div>
	</div>
	<div class="column is-12-mobile-xs is-6-touch is-6-desktop">
		<p class="title is-size-6 has-text-grey">Judul PKM</p>
		<p class="subtitle is-size-3 has-text-link has-text-weight-semibold"><?= $datanya->nama_pkm;?></p>
		<table class="table has-text-grey">
			<tbody>
				<tr>
					<td>
					Jenis PKM</td>
					<td>:</td>
					<td><?= $datanya->jenis_pkm;?></td>
				</tr>
				<tr>
					<td>
					Tahun</td>
					<td>:</td>
					<td><?= $datanya->tahun_pkm;?></td>
				</tr>
				<tr>
					<td>
					Anggota</td>
					<td>:</td>
					<td>
						<ul>
							<li><?= $datanya->ketua_pkm;?> (KETUA)</li>
							<?= $datanya->anggota_pkm;?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="column is-12 pkm-deskripsi has-text-grey has-text-justified">
		<?= $datanya->text_pkm;?>
	</div>
</div>