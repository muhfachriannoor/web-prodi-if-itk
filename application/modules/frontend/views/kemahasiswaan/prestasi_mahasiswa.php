<?php if($prestasi->num_rows() != 0): ?>
<div id="prestasi-mahasiswa">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Prestasi mahasiswa</h1>
	<p class="has-text-grey">Prestasi mahasiswa dalam bidang akademik & non-akademik</p>
	<br>	
	<div class="prestasi-form">
		<div class="select">
			<select name="filter-prestasi" id="filter-prestasi">
			    <option value="DESC" <?= ($this->input->get('filter') == 'DESC') ? 'selected="selected"' : '';?>>Terbaru</option>
			    <option value="ASC" <?= ($this->input->get('filter') == 'ASC') ? 'selected="selected"' : '';?>>Terlama</option>
		  	</select>
		</div>
	</div>
	<div class="prestasi-wrap" id="prestasi-tampil">
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
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>