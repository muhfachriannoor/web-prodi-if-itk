<?php  ?>
<div id="beasiswa" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Beasiswa</h3>
	<p class="has-text-grey">Berbagai macam program beasiswa yang dapat dimanfaatkan oleh mahasiswa(i) selama perkuliahan:</p><br>
	<table id="test" class="table-data table">
		<thead>
			<tr>
				<th>Program Beasiswa</th>
				<th width="30%">Tanggal & Waktu</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($beasiswa->result() as $no => $beasiswa): ?>
			<tr>
				<td>
					<a href="<?= site_url('beranda/beasiswa/detail/'.$beasiswa->slug_beasiswa);?>">
						<?= $beasiswa->nama_beasiswa;?>
					</a>
				</td>
				<td class="has-text-grey"><?= tgl_lengkap($beasiswa->tanggal_beasiswa);?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>