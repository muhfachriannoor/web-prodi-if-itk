<?php  ?>
<div id="kontak">
	<h3 class="title is-size-4">Program Studi <b class="has-text-link">INFORMATIKA</b></h3>
	<p>Institut Teknologi Kalimantan</p>
	<p><?= $kontak->alamat;?></p>
	<p>Telp. <?= $kontak->telpon;?></p>
	<p>Email. <?= $kontak->email;?></p>
	<br>
	<div class="mapouter">
		<div class="gmap_canvas">
			<iframe id="gmap_canvas" src="<?= $kontak->gmap;?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
		</div>
	</div>
</div>