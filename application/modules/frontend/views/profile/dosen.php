<?php  ?>
<div id="dosen-tendik">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Dosen dan Tenaga Pendidik</h3>
	<p class="has-text-grey">Sumber daya manusia program studi Informatika tersusun atas tenaga dosen dan tenaga kependidikan.</p>
	<br>	
	<table class="table is-fullwidth is-hoverable is-striped" id="test">
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>NIP/NIPH</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($dosen->result() as $no => $dosen): ?>
			<tr>
				<td><a href="<?= site_url('profile/dosen/detail/'.$dosen->slug_dosen);?>"><?= $dosen->nama_dosen;?></a></td>
				<td><?= $dosen->nip_dosen;?></td>
				<td><?= $dosen->email_dosen;?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>