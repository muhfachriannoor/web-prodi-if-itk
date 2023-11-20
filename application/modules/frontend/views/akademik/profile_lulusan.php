<?php if($profile_lulusan->num_rows() != 0): ?>
<div id="profile-lulusan" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Profile Lulusan</h3>
	<p class="has-text-grey">Berbagai peran yang dapat dilakukan oleh lulusan program studi informatika di bidang keahlian atau bidang kerja tertentu setelah menyelesaikan masa perkuliahan.</p>
	<br>
	<table id="test" class="table is-fullwidth">
		<thead>
			<tr>
				<th width="30%">Profil</th>
				<th width="70%">Capaian Pembelajaran</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($profile_lulusan->result() as $no => $profile_lulusan): ?>
			<tr>
				<td><?= $profile_lulusan->profil;?></td>
				<td><?= $profile_lulusan->capaian;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>