<?php foreach($prestasi->result() as $no => $prestasi): ?>
	<div class="columns">
	<div class="column">
		<a href="<?= site_url('kemahasiswaan/prestasi_mahasiswa/detail/'.$prestasi->slug_prestasi);?>">
			<h5 class="title is-size-5 has-text-warning has-text-weight-bold is-uppercase"><?= $prestasi->peringkat_prestasi;?></h5>
		</a>
		<p class="subtitle is-size-5"><?= $prestasi->nama_prestasi;?></p>
		<div class="tags has-addons is-medium"> 
			<span class="tag is-danger">
				<span class="icon">
					<i class="fas fa-map-marker-alt"></i> 
				</span>
				<span></span>
				 <?= $prestasi->tempat_prestasi;?>	
			</span>
			<span class="tag is-primary">
				<span class="icon">
					<i class="far fa-calendar-alt"></i>
				</span> 
				<span></span>
				 <?= tgl_indo($prestasi->date_prestasi);?>
			</span>
		</div>
	</div>
	<div class="column prestasi-nama">
		<div class="has-text-grey has-text-weight-semibold is-capitalized">
			<?= $prestasi->anggota_prestasi;?>
		</div>
	</div>
</div>
<?php endforeach; ?>
<?= $pagination;?>