<?php ?>
<div id="sekilas" class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
	<div class="column is-8-mobile-xs is-6-mobile is-5-tablet is-4-desktop">
		<img src="<?= base_url('asset/backend/upload/overview/'.$overview->foto_overview);?>" alt="">
	</div>
	<div class="column sekilas-info is-12-mobile-xs is-9-mobile is-7-tablet is-8-desktop">
		<h3 class="has-text-link is-uppercase has-text-weight-bold is-size-3 has-text-centered-mobile">informatika</h3>
		<table class="table">
			<tbody>
				<tr>
					<td>Universitas</td>
					<td>:</td>
					<td>Institut Teknologi Kalimantan</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>Jl. Soekarno-Hatta Km. 15, Karang Joang, Balikpapan, Kalimantan Timur, 76127 </td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>:</td>
					<td><?= $overview->jurusan;?></td>
				</tr>
				<tr>
					<td>Akreditasi</td>
					<td>:</td>
					<td><?= $overview->akreditasi;?></td>
				</tr>
				<tr>
					<td>Ketua Prodi</td>
					<td>:</td>
					<td><?= $overview->nama_dosen;?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="column is-12 sekilas-minat">
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile is-uppercase has-text-centered ">
			<div class="column is-6-mobile-xs is-4-mobile">
				<p class="subtitle judul-data">Bidang Minat</p>
				<h1 class="title is-size-2 has-text-link hasil-data"><?= $jumlah_bidangminat;?></h1>
			</div>
			<div class="column is-6-mobile-xs is-4-mobile">
				<p class="subtitle judul-data">Dosen</p>
				<h1 class="title is-size-2 has-text-link hasil-data"><?= $jumlah_dosen;?></h1>
			</div>
			<div class="column is-6-mobile-xs is-4-mobile">
				<p class="subtitle judul-data">Mahasiswa</p>
				<h1 class="title is-size-2 has-text-link hasil-data"><?= $overview->jumlah_mahasiswa;?></h1>
			</div>
			<div class="column is-6-mobile-xs is-4-mobile">
				<p class="subtitle judul-data">Lulusan</p>
				<h1 class="title is-size-2 has-text-link hasil-data"><?= $jumlah_alumni;?></h1>
			</div>
			<div class="column is-6-mobile-xs is-4-mobile">
				<p class="subtitle judul-data">Prestasi</p>
				<h1 class="title is-size-2 has-text-link hasil-data"><?= $jumlah_prestasi;?></h1>
			</div>
		</div>
	</div>
	<div class="column is-12 sekilas-galeri">
		<?php if($overview->url_youtube != ''): ?>
		<h4 class="is-uppercase is-size-4 has-text-weight-semibold title">Profile Video</h4>
		<iframe src="<?= $overview->url_youtube;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<?php endif; ?>
		<?php if($galeri->num_rows() != 0): ?>
		<h4 class="is-uppercase is-size-4 has-text-weight-semibold title">Galeri</h4>
		<div class="columns is-multiline is-centered">
			<?php foreach($galeri->result() as $no => $galeri): ?>
			<div class="column is-6-desktop is-6-tablet is-12-mobile-xs is-8-mobile">
				<img src="<?= base_url('asset/backend/upload/galeri/'.$galeri->foto_galeri);?>" alt="">
			</div>
			<?php endforeach; ?>
				<!-- <a class="button is-link is-outlined">Lihat lagi</a> -->
		</div>
		<?php endif; ?>
	</div>
</div>