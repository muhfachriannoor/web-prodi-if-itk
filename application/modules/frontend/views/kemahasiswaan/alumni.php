<?php if($alumni->num_rows() != 0): ?>
<div id="alumni">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Alumni</h3>
	<p class="has-text-grey">Informasi mengenai jejak lulusan program studi informatika</p>
	<br>
	<article class=" message is-primary">
	  <div class="message-body has-text-primary">
	    Total alumni seluruh angkatan saat ini : <b><?= $jumlah_alumni;?></b> orang
	  </div>
	</article>
	<div class="alumni-form">
			<!-- <p>Total alumni : <b>10</b></p> -->
		<div class="select">
		  <select name="filter-angkatan" id="filter-angkatan">
		    <option value="">Tahun Angkatan</option>
		    <?php foreach($tahun_masuk->result() as $no => $tahun_masuk): ?>
		    	<option value="<?= $tahun_masuk->tahunmasuk_alumni;?>" <?= ($this->input->get('filter') == $tahun_masuk->tahunmasuk_alumni) ? 'selected="selected"' : ''?>><?= $tahun_masuk->tahunmasuk_alumni;?></option>
			<?php endforeach; ?>
		  </select>
		</div>
	</div>
	<div class="alumni-wrap columns is-multiline" id="alumni-tampil">
		<?php if($this->input->get('filter') != ''): ?>
			<p class="right">Total alumni : <b><?= $jumlah_angkatan;?></b></p><br><br>
		<?php endif; ?>
		<?php foreach($alumni->result() as $no => $alumni): ?>
			<div class="column is-12 alumni-item">
				<div class="columns ">
					<div class="column is-2">
						<img src="<?= base_url('asset/backend/upload/alumni/'.$alumni->foto_alumni);?>" alt="">
					</div>
					<div class="column">
						<h2 class="title is-size-4"><?= $alumni->nama_alumni;?></h2>
						<div class="subtitle field is-grouped is-grouped-multiline">
						  <div class="control">
							<span class="tag is-link">
								Informatika - <?= $alumni->nim_alumni;?>
							</span>
						  </div>
						  <div class="control">
						    <div class="tags has-addons">
						      <span class="tag is-dark"><?= $alumni->tahunmasuk_alumni;?></span>
						      <span class="tag is-primary"><?= $alumni->tahunlulus_alumni;?></span>
						    </div>
						  </div>
						</div>
						<h3 class="has-text-primary is-size-5 has-text-weight-semibold">
							<?= $alumni->jejak;?>
						</h3>
						<p class="has-text-justified has-text-grey"><?= strip_tags($alumni->text_jejak);?></p>
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