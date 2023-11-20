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