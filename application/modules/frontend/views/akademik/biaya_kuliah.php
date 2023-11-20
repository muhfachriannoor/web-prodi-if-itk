<?php if($biaya_kuliah_snm_sbm->num_rows() != 0 AND $biaya_kuliah_mandiri->num_rows() != 0): ?>
<div id="biaya-kuliah" class="has-text-justified">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Biaya Kuliah</h3>
	<p class="has-text-grey">UKT di ITK dibagi menjadi 8 (delapan) kategori yang disesuaikan dengan kemampuan ekonomi keluarga/orang tua mahasiswa. Indeks kemampuan ekonomi orang tua ditentukan pada saat daftar ulang. Kategori maksudnya golongan pembayaran UKT.</p>
	<br>
	<div class="biaya-snsb">
		<h4 class="is-size-4 has-text-weight-semibold">SNMPTN & SBMPTN</h4>
		<p class="has-text-grey">Setelah mahasiswa baru dinyatakan lolos diterima di ITK Jalur SNMPTN dan Jalur SBMPTN, mahasiswa tersebut diwajibkan menyerahkan berkas-berkas seperti: bukti rekening listrik, air, penghasilan orang tua, kepemilikan kendaraan, dan lainnya yang hasilnya nanti menjadi pertimbangan pada penentuan kategori/golongan berapa mahasiswa baru tersebut membayar UKT:</p>
		<table class="table is-fullwidth is-bordered">
			<thead>
				<tr>
					<th>Kategori UKT</th>
					<th>Tarif UKT</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($biaya_kuliah_snm_sbm->result() as $no => $biaya_kuliah_snm_sbm): ?>
				<tr>
					<td><?= $biaya_kuliah_snm_sbm->kategori_biaya;?></td>
					<td><?= rupiah($biaya_kuliah_snm_sbm->tarif_biaya);?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<br>
	<div class="biaya-mandiri">
		<h4 class="is-size-4 has-text-weight-semibold">MANDIRI</h4>
		<p class="has-text-grey">Biaya pendidikan jalur Seleksi Mandiri (SM ITK) mengikuti ketentuan yang ditetapkan ITK, yaitu terdiri dari Sumbangan Pengembangan Institusi (SPI) dan Uang Kuliah Tunggal (UKT). Mahasiswa yang diterima melalui Jalur Mandiri tidak dapat mengajukan keringanan uang kuliah (SPI dan UKT).</p>
		<p class="has-text-grey">Adapun SPI dibayarkan hanya sekali yaitu ketika daftar ulang dan UKT dibayarkan setiap awal semester.</p>
		<table class="table is-fullwidth is-bordered">
			<thead>
				<tr>
					<th>SPI</th>
					<th>UKT</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($biaya_kuliah_mandiri->result() as $no => $biaya_kuliah_mandiri): ?>
				<tr>
					<td><?= rupiah($biaya_kuliah_mandiri->tarif_spi_biaya);?></td>
					<td><?= rupiah($biaya_kuliah_mandiri->tarif_biaya);?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>