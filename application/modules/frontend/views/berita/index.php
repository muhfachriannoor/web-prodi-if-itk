<?php if($berita->num_rows() != 0): ?>
<div id="berita-page">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Berita</h3>
	<p class="has-text-grey">Berita terkait program studi Informatika.</p>
	<br>
	<div class="berita-form">
		<div class="select">
			<select name="filter-berita" id="filter-berita">
			    <option value="DESC" <?= ($this->input->get('filter') == 'DESC') ? 'selected="selected"' : '';?>>Terbaru</option>
			    <option value="ASC" <?= ($this->input->get('filter') == 'ASC') ? 'selected="selected"' : '';?>>Terlama</option>
		  	</select>
		</div>
		<div class="select">
			<select name="filter-kategori" id="filter-kategori">
				<option value="" hidden="hidden">Kategori</option>
				<?php foreach($kategori->result() as $no => $kategori): ?>
			    <option value="<?= $kategori->nama_kategori;?>" <?= ($this->input->get('filter_kategori') == $kategori->nama_kategori) ? 'selected="selected"' : '';?>><?= $kategori->nama_kategori;?></option>
				<?php endforeach; ?>
		  	</select>
		</div>
	</div>
	<br>

	<div id="berita-tampil">
		<?php foreach($berita->result() as $berita): ?>
			<div class="columns berita-wrap">
				<div class="column is-3">
					<img src="<?= base_url('asset/backend/upload/berita/'.$berita->foto_berita);?>" alt="">
				</div>
				<div class="column">
					<div class="berita-info">
						<span class="is-size-7 has-text-grey">
							<i class="fas fa-tag"></i>
							<?= $berita->nama_kategori;?> 
							-
							<i class="far fa-calendar-alt"></i>
							<?= tgl_lengkap($berita->tanggal_berita);?>
						</span>
						<a href class="title is-size-4 has-text-weight-semibold">
							<?= $berita->judul_berita;?>
						</a>
						<p class=" has-text-grey">
							<?= strip_tags(substr($berita->isi_berita, 0,200));?>
						</p>
						<a href="<?= site_url('berita/detail/'.$berita->slug_berita);?>" class="button is-link is-small">Lebih lanjut</a>
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