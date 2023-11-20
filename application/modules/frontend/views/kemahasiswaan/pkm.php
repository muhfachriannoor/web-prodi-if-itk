<?php  ?>
<div id="program-kreativitas-mahasiswa">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Program Kreativitas Mahasiswa</h3>
	<p class="has-text-justified has-text-grey">Berbagai inovasi dari mahasiswa(i) program studi informatika.</p>
	<br>	
	<table class="table is-bordered is-fullwidth is-hoverable is-striped" id="test">
		<thead>
			<tr>
				<th width="55%">Nama Program</th>
				<th>Tahun</th>
				<th>Ketua</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pkm->result() as $no => $pkm): ?>
			<tr>
				<td>
					<a href="<?= site_url('kemahasiswaan/pkm/detail/'.$pkm->slug_pkm);?>">
						<?= $pkm->nama_pkm;?>
					</a>
				</td>
				<td><?= $pkm->tahun_pkm;?></td>
				<td>(11181054) <?= $pkm->ketua_pkm;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>