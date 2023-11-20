<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Kegiatan
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Kegiatan</a></li>
      <li class="active">Info Kegiatan</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Info</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <?php if($datanya->foto_kegiatan != ''): ?>
              <img src="<?= base_url('asset/backend/upload/kegiatan/'.$datanya->foto_kegiatan);?>" alt="" class="img-rounded" style="width: 400px; height: 500px;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 500px;">

            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Judul</td>
                  <td><b><?= $datanya->judul_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Jenis</td>
                  <td><b><?= $datanya->jenis_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Penyelenggara</td>
                  <td><b><?= $datanya->penyelenggara_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Materi</td>
                  <td><b><?= $datanya->materi_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Peserta</td>
                  <td><b><?= $datanya->peserta_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tanggal</td>
                  <td><b><?= tgl_lengkap($datanya->tgl_kegiatan);?></b></td>
                </tr>
                <tr>
                  <td width="20%">Lokasi</td>
                  <td><b><?= $datanya->lokasi_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">ruang</td>
                  <td><b><?= $datanya->ruang_kegiatan;?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/kegiatan');?>';return false;">Kembali</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>