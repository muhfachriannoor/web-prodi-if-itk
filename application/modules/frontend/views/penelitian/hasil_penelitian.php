<?php  ?>
<div id="hasil-penelitian" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Hasil Penelitian</h3>
	<p class="has-text-grey">Hasil dari kegiatan penelitian dalam pengembangan produk - produk penelitian inovatif dan berkualitas.</p>
	<br>
	<table class="table is-bordered is-fullwidth is-hoverable is-striped" id="test">
		<thead>
			<tr>
				<th>Judul Penelitian</th>
				<th width="10%">Tahun</th>
				<th width="20% ">Sumber Dana</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($hasil_penelitian->result() as $no => $hasil_penelitian): ?>
			<tr>
				<td>
					<a href="<?= site_url('penelitian/hasil_penelitian/detail/'.$hasil_penelitian->slug_penelitian);?>">
						<?= $hasil_penelitian->judul_penelitian;?>
					</a>
				</td>
				<td><?= $hasil_penelitian->tahun_penelitian;?></td>
				<td><?= $hasil_penelitian->sumberdana_penelitian;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>