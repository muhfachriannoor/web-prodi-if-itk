<?php  ?>
<div id="detail-dosentendik">
	<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
		<div class="column is-8-mobile-xs is-5-mobile is-5-tablet is-4-desktop">
			<?php if($datanya->foto_dosen != ''): ?>
				<img src="<?= base_url('asset/backend/upload/dosen/'.$datanya->foto_dosen);?>" alt="">
			<?php else: ?>
				<img src="<?= base_url('asset/backend/upload/default-user.png');?>" alt="">
			<?php endif; ?>
		</div>
		<div class="column is-12-mobile-xs is-7-mobile is-7-tablet is-8-desktop">
			<div>
				<h2 class="title is-size-4-touch is-size-3-desktop"><?= $datanya->nama_dosen;?></h2>
				<h3 class="subtitle">
					<span class="tag is-link">
						NIP. <b><?= $datanya->nip_dosen;?></b>
					</span>
				</h3>
			</div>
			<div class="has-text-weight-semibold has-text-grey">
				<p><?= $datanya->jabatan_dosen;?></p>
				<p><?= $datanya->email_dosen;?></p>
			</div>
			<div class="is-italic has-text-grey is-capitalized">
				<?php foreach($pendidikan->result() as $no => $pendidikan): ?>
				<p><?= $pendidikan->text_pendidikan;?></p>
				<?php endforeach; ?>
			</div>
			<?php if($datanya->text_dosen != ''): ?>
			<div class="ket-dosen">
				<a class="has-text-link">Keterangan <i class="fas fa-sort-down"></i></a>
				<p class="has-text-grey has-text-justified" style="display: none"><?= $datanya->text_dosen;?></p>
			</div>
			<?php endif; ?>
			<div class="link-dosentendik">
				<!-- <a href="">
					<span class="icon is-medium has-text-grey">
						<i class="fas fa-envelope"></i>
					</span>
				</a> -->
				<?php if($datanya->linkedin != ''): ?>
				<a href="<?= $datanya->linkedin;?>" target="_blank">
					<span class="icon is-medium has-text-grey">
						<i class="fab fa-linkedin-in"></i>
					</span>
				</a>
				<?php endif; ?>
				<?php if($datanya->gschoolar != ''): ?>
				<a href="<?= $datanya->gschoolar;?>" target="_blank">
					<span class="icon is-medium has-text-grey">
						<i class="fas fa-graduation-cap"></i>
					</span>
				</a>
				<?php endif; ?>
				<?php if($datanya->scopus != ''): ?>
				<a href="<?= $datanya->scopus;?>" target="_blank">
					<span class="icon is-medium has-text-grey">
						<i class="fab fa-sm fa-stripe-s"></i>
					</span>
				</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="column is-12-touch is-12-desktop">
			<div class="tabs">
			    <ul>
				    <li class="is-active" data-tab="menu1">
				        <a>
				      		Keahlian
				        </a>
				    </li>
				    <li class="" data-tab="menu2">
				        <a>
				      		Minat Penelitian
				        </a>
				    </li>
				    <li class="" data-tab="menu3">
				        <a>
				      		Publikasi
				        </a>
				    </li>
				    <li class="" data-tab="menu4">
				        <a>
				      		Proyek Penelitian
				        </a>
				    </li>
				    <li class="" data-tab="menu5">
				        <a>
				      		Pengalaman Kerja
				        </a>
				    </li>
			  	</ul>
			</div>

			<div id="menu1" class="tab-content current-tab">
				<div class="content">
					<ul>
						<?php foreach($keahlian->result() as $no => $keahlian): ?>
						<li><?= $keahlian->nama_keahlian;?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="menu2" class="tab-content">
				<div class="content">
					<ul>
						<?php foreach($minatpenelitian->result() as $no => $minatpenelitian): ?>
						<li><?= $minatpenelitian->nama_minat;?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="menu3" class="tab-content">
				<div class="content">
					<ul>
						<?php foreach($publikasi->result() as $no => $publikasi): ?>
						<?php if($publikasi->link_publikasi != ''): ?>
						<li>
							<a href="<?= $publikasi->link_publikasi;?>" target="_blank"><?= $publikasi->text_publikasi;?></a>
						</li>
						<?php else: ?>
						<li><?= $publikasi->text_publikasi;?></li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="menu4" class="tab-content">
				<div class="content">
					<ul>
						<?php foreach($penelitian->result() as $no => $penelitian): ?>
						<li><?= $penelitian->text_penelitian;?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="menu5" class="tab-content">
				<div class="content">
					<ul>
						<?php foreach($pengalaman->result() as $no => $pengalaman): ?>
						<li><?= $pengalaman->text_pengalaman;?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>