<?php if($kalender_akademik_file != ''): ?>
<link href='<?= base_url('asset/frontend/fullcalendar/');?>packages/core/main.css' rel='stylesheet' />
<link href='<?= base_url('asset/frontend/fullcalendar/');?>packages/daygrid/main.css' rel='stylesheet' />

<script src='<?= base_url('asset/frontend/fullcalendar/');?>packages/core/main.js'></script>
<script src='<?= base_url('asset/frontend/fullcalendar/');?>packages/daygrid/main.js'></script>
<!-- <script src='<?= base_url('asset/frontend/fullcalendar/');?>packages/timegrid/main.js'></script> -->

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      defaultDate: '<?= date('Y-m-d');?>',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [
      	<?php
	        foreach($kalender_akademik->result() as $tampil):
	            $kalender_akademik = str_replace('"','',$tampil->judul_kalender);
	            $trim = trim($kalender_akademik,"'");
	            $dateadd = $this->db->query("SELECT DATE_ADD('$tampil->end_kalender', INTERVAL 1 DAY) AS tanggal")->row();
    	?>
        {
          title: "<?php echo $trim;?>",
          start: "<?php echo $tampil->start_kalender;?>",
          end: "<?php echo $dateadd->tanggal;;?>",
        },
    	<?php endforeach; ?>
      ]
    });

    calendar.render();
  });

</script>
<div id="kalender-akademik">
	<h3 class="is-size-3 has-text-weight-bold has-text-grey-dark">Kalender Akademik</h3>
	<p class="has-text-grey has-text-justified">Jadwal akademik selama tahun ajaran yang telah ditentukan.</p>
	<br>
	<div id="calendar"></div><br>
	<div class="columns wrap-download is-multiline is-desktop is-tablet is-mobile">
		<div class="column is-3-mobile-xs is-2-mobile is-2-tablet is-2-desktop">
			<img src="<?= base_url('asset/frontend/');?>img/pdf3s.png" alt="">
		</div>
		<div class="column is-9-mobile-xs is-7-mobile is-8-tablet is-8-desktop">
			<p><?= $kalender_akademik_file->kalender_file;?></p>
			<br>
			<div class="has-text-weight-light">
				<p class="has-text-grey">Tahun ajaran <b class="has-text-success"><?= $kalender_akademik_file->tahunajar_kalender;?></b ></p>
				<p class="has-text-grey">Jadwal rilis <b class="has-text-success"><?= tgl_lengkap($kalender_akademik_file->tglrilis_kalender);?></b ></p>
			</div>
		</div>
		<a href="<?= base_url('asset/backend/upload/kalender_akademik/'.$kalender_akademik_file->kalender_file);?>" target="_blank" class="column is-12-mobile-xs is-3-mobile is-2-tablet is-2-desktop has-background-success">
			<span class="icon is-large has-text-grey-dark">
				<i class="fas fa-3x fa-download"></i>
			</span>
			<b class="has-text-grey-dark"><?= ukuran_file($kalender_akademik_file->ukuran_file);?></b>
		</a>
	</div>
</div> 
<?php else: ?>
<div id="data-kosong" class="has-text-centered">
	<img src="<?= base_url('asset/frontend/');?>img/box.png" alt="">
	<h3 class="title is-size-3 has-text-danger has-text-weight-semibold">Maaf, tidak ada data</h3>
	<p class="subtitle has-text-grey-light ">Data dari menu terkait sedang tidak ada, silahkan kembali lagi nanti.</p>
</div>
<?php endif; ?>