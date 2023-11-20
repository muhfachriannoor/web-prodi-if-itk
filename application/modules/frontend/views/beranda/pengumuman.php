<?php  ?>
<div id="pengumuman" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Pengumuman</h3>
	<p class="has-text-grey">Informasi terbaru yang ditujukan kepada mahasiswa(i) program studi informatika :</p><br>
	<table class="table is-bordered is-fullwidth is-hoverable is-striped" id="test">
		<thead>
			<tr>
				<th>Judul Pengumuman</th>
				<th width="30%">Tanggal & Waktu</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pengumuman->result() as $no => $pengumuman):?>
			<tr>
				<td>
					<a href="<?= site_url('beranda/pengumuman/detail/'.$pengumuman->slug_pengumuman);?>">
						<?= $pengumuman->judul_pengumuman;?>
					</a>
				</td>
				<td><?= tgl_lengkap($pengumuman->tgl_pengumuman);?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
