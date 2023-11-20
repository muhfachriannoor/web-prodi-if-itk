<?php if($grup_penelitian->num_rows() != 0): ?>
<div id="grup-penelitian" class=" ">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Grup Penelitian</h3>
	<p class="has-text-grey">Kegiatan penelitian dalam pengembangan produk - produk penelitian inovatif dan berkualitas :</p>
	<div class="content">
		<ul>
			<?php foreach($grup_penelitian->result() as $no => $grup_penelitian): ?>
			<li class="has-text-justified">
				<h4><?= $grup_penelitian->nama_grup;?></h4>
				<?= $grup_penelitian->deskripsi_grup;?>
			</li>
			<br>
			<?php endforeach; ?>
		</ul>
	</div>	
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>