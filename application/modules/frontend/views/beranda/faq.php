<?php if($faq->num_rows() != 0):  ?>
<div id="faq" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">FAQ</h3>
	<p class="has-text-grey">Tanya jawab mengenai hal - hal yang masih belum jelas terkait program studi Informatika.</p>
	<br>
	<div class="content">
		<?php foreach($faq->result() as $no => $faq): ?>
		<div class="faq-wrap">
			<h5 class="has-text-link has-text-weight-semibold is-uppercase"><?= $faq->question;?></h5>
			<blockquote>
				<p><?= $faq->answer;?></p>
			</blockquote>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>