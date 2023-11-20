<?php if($kurikulum->num_rows() != 0): ?>
<div id="kurikulum">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Kurikulum</h3>
	<p class="has-text-grey has-text-justified">Informasi perangkat mata kuliah semester maupun keminatan.</p>
	<br>
	<div>
	<?php foreach($kurikulum->result() as $no => $kurikulum): ?>
	<div class="kurikulum-wrap">
		<h3 class="kurikulum-jenis"><?= $kurikulum->jenis_kurikulum;?></h3>
		<div class="kurikulum-semester">
			<?php
				$idKurikulum = $kurikulum->idKurikulum;
				$semester = $this->db->get_where('sm_kurikulum_detail',array('idKurikulum' => $idKurikulum));
				foreach($semester->result() as $no => $semesternya):
					$idDetailKurikulum = $semesternya->idDetailKurikulum;
					$matkul = $this->db->get_where('sm_kurikulum_matkul',array('idDetailKurikulum' => $idDetailKurikulum));	
			?>
			<div>
				<h4 class="kurikulum-isijenis"><?= $semesternya->nama_detailkurikulum;?></h4>
				<div>
					<?php if($matkul->num_rows() != 0): ?>
					<table class="table is-fullwidth is-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Mata Kuliah (MK)</th>
								<th>Sks</th>
								<th>Praktikum</th>
							</tr>
						</thead>
						<tfoot>
							<?php $total = $this->db->select_sum('sks_matkul')->where('idDetailKurikulum',$idDetailKurikulum)->get('sm_kurikulum_matkul')->row();?>
							<tr>
								<th></th>
								<th></th>
								<th class="has-text-right">Total</th>
								<th><?= $total->sks_matkul;?></th>
								<th></th>
							</tr>
						</tfoot>
						<tbody>
							<?php foreach($matkul->result() as $no => $matkulnya):?>
							<tr>
								<td><?= $no+1;?></td>
								<td><?= $matkulnya->kode_matkul;?></td>
								<td><?= $matkulnya->nama_matkul;?></td>
								<td><?= $matkulnya->sks_matkul;?></td>
								<td><?= ($matkulnya->praktikum_matkul == 1) ? 'Ada' : 'Tidak Ada';?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php else: ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
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