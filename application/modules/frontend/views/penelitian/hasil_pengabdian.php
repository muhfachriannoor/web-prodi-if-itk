<?php  ?>
<div id="hasil-pengabdian" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Hasil Pengabdian</h3>
	<p class="has-text-grey">Kegiatan penelitian untuk menyelesaikan permasalahan yang terjadi di tengah masyarakat :</p>
		<br>
	<table class="table is-bordered is-fullwidth is-hoverable is-striped" id="test">
		<thead>
			<tr>
				<th>Judul Pengabdian</th>
				<th width="10%">Tahun</th>
				<th width="20% ">Sumber Dana</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($hasil_pengabdian->result() as $no => $hasil_pengabdian): ?>
			<tr>
				<td>
					<a href="<?= site_url('penelitian/hasil_pengabdian/detail/'.$hasil_pengabdian->slug_pengabdian);?>">
						<?= $hasil_pengabdian->judul_pengabdian;?>
					</a>
				</td>
				<td><?= $hasil_pengabdian->tahun_pengabdian;?></td>
				<td><?= $hasil_pengabdian->sumberdana_pengabdian;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>