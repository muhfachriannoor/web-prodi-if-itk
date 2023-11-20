<?php  ?>
<div id="tingkat-keketatan">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Tingkat Keketatan</h3>
	<p class="has-text-grey has-text-justified">Informasi statistik terkait tingkat keketatan program studi informatika dalam jalur masuk yang berbeda-beda.</p>
	<br>
	<div class="tabs is-boxed is-fullwidth">
	    <ul>
		    <li class="is-active" data-tab="menu1">
		        <a>
		      		SNMPTN
		        </a>
		    </li>
		    <li class="" data-tab="menu2">
		        <a>
		      		SBMPTN	
		        </a>
		    </li>
		    <li class="" data-tab="menu3">
		        <a>
		      		MANDIRI
		        </a>
		    </li>
		    <li class="" data-tab="menu4">
		        <a>
		      		UTBK
		        </a>
		    </li>
	  	</ul>
	</div>

	<div id="menu1" class="tab-content current-tab">
		<div class="content">
			<table class="table is-bordered is-fullwidth">
				<thead>
					<tr>
						<th>Tahun</th>
						<th>Peminat</th>
						<th>Daya Tampung</th>
						<th>Persentase</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($snm->result() as $no => $snm):
						$presentase = ($snm->kuota_keketatan / $snm->peminat_keketatan) * 100;
					?>
					<tr>
						<td><?= $snm->tahun_keketatan;?></td>
						<td><?= $snm->peminat_keketatan;?></td>
						<td><?= $snm->kuota_keketatan;?></td>
						<td><?= ceil($presentase);?>%</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="menu2" class="tab-content">
		<div class="content">
			<table class="table is-bordered is-striped is-fullwidth">
				<thead>
					<tr>
						<th>Tahun</th>
						<th>Peminat</th>
						<th>Daya Tampung</th>
						<th>Persentase</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php
						foreach($sbm->result() as $no => $sbm):
						$presentase = ($sbm->kuota_keketatan / $sbm->peminat_keketatan) * 100;
					?>
					<tr>
						<td><?= $sbm->tahun_keketatan;?></td>
						<td><?= $sbm->peminat_keketatan;?></td>
						<td><?= $sbm->kuota_keketatan;?></td>
						<td><?= ceil($presentase);?>%</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="menu3" class="tab-content">
		<div class="content">
			<table class="table is-bordered is-striped is-fullwidth">
				<thead>
					<tr>
						<th>Tahun</th>
						<th>Peminat</th>
						<th>Daya Tampung</th>
						<th>Persentase</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($mandiri->result() as $no => $mandiri):
						$presentase = ($mandiri->kuota_keketatan / $mandiri->peminat_keketatan) * 100;
					?>
					<tr>
						<td><?= $mandiri->tahun_keketatan;?></td>
						<td><?= $mandiri->peminat_keketatan;?></td>
						<td><?= $mandiri->kuota_keketatan;?></td>
						<td><?= ceil($presentase);?>%</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="menu4" class="tab-content">
		<div class="content">
			<table class="table is-bordered is-striped is-fullwidth">
				<thead>
					<tr>
						<th>Tahun</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($utbk->result() as $no => $utbk):
					?>
					<tr>
						<td><?= $utbk->tahun_keketatan;?></td>
						<td><?= $utbk->nilai;?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>