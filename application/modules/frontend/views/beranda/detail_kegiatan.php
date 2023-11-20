<?php  ?>
<div id="kegiatan-detail" class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
	<div class="column is-6-desktop is-8-touch is-12-mobile-xs">
		<a class="img-modals" data-target="#detail-kegiatan">
			<?php if($datanya->foto_kegiatan != ''): ?>
		 		<img src="<?= base_url('asset/backend/upload/kegiatan/'.$datanya->foto_kegiatan);?>" alt="">
		 	<?php else: ?>
		 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
		 	<?php endif; ?>
		</a>
		<div class="modal" id="detail-kegiatan">
		  <div class="modal-background"></div>
		  <div class="modal-content">
		    <p class="image">
			 	<?php if($datanya->foto_kegiatan != ''): ?>
			 		<img src="<?= base_url('asset/backend/upload/kegiatan/'.$datanya->foto_kegiatan);?>" alt="">
			 	<?php else: ?>
			 		<img src="<?= base_url('asset/backend/upload/default.png');?>" alt="">
			 	<?php endif; ?>
		    </p>
		  </div>
		  <button class="modal-close is-large" aria-label="close"></button>
		</div>
	</div>
	<div class="column is-6-desktop is-10-touch is-12-mobile-xs">
		<h3 class="title is-size-3-desktop is-size-3-tablet is-size-4-mobile has-text-link">Info Kegiatan</h3>
		<p class="subtitle is-size-5-mobile is-size-4-desktop is-size-4-tablet has-text-weight-semibold is-italic"><?= $datanya->judul_kegiatan;?></p>
		<table class="table">
			<tbody class="has-text-grey">
				<tr>
					<td width="35%">
					 Jenis Kegiatan
					</td>
					<td>:</td>
					<td><?= $datanya->jenis_kegiatan;?></td>
				</tr>
				<tr>
					<td width="35%">
					 Penyelenggara
					</td>
					<td>:</td>
					<td><?= $datanya->penyelenggara_kegiatan;?></td>
				</tr>
				<tr>
					<td width="35%">
					 Keterangan</td>
					<td>:</td>
					<td><?= $datanya->materi_kegiatan;?></td>
				</tr>
				<tr>
					<td width="35%">
					 Peserta</td>
					<td>:</td>
					<td><?= $datanya->peserta_kegiatan;?></td>
				</tr>
			</tbody>
		</table>
		<h3 class="title is-size-3-desktop is-size-3-tablet is-size-4-mobile has-text-link">Pelaksanaan</h3>
		<table class="table is-hovered">
			<tbody class="has-text-grey">
				<tr>
					<td width="35%">
					 Jadwal</td>
					<td>:</td>
					<td><?= tgl_lengkap($datanya->tgl_kegiatan);?></td>
				</tr>
				<tr>
					<td width="35%">
					 Lokasi</td>
					<td>:</td>
					<td><?= $datanya->lokasi_kegiatan;?></td>
				</tr>
				<tr>
					<td width="35%">
					 Ruang</td>
					<td>:</td>
					<td><?= $datanya->ruang_kegiatan;?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>