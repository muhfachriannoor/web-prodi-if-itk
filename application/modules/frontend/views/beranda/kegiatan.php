<?php  ?>
<div id="kegiatan" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Kegiatan</h3>
	<p class="has-text-grey">Kegiatan terbaru yang ditujukan kepada mahasiswa(i) program studi informatika :</p><br>
	<table class="table is-bordered is-fullwidth" id="test">
		<thead>
			<tr>
				<th width="70%">Judul Kegiatan</th>
				<th>Jadwal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($kegiatan->result() as $no => $kegiatan): ?>
			<tr>
				<td>
					<a href="<?= base_url('beranda/kegiatan/detail/'.$kegiatan->slug_kegiatan);?>">
						<?= $kegiatan->judul_kegiatan;?>
					</a>
				</td>
				<td><?= tgl_lengkap($kegiatan->tgl_kegiatan);?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
