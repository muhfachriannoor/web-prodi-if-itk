<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Prestasi Mahasiswa
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Prestasi Mahasiswa</a></li>
      <li class="active">Info Prestasi Mahasiswa</li>
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
            <?php if($datanya->foto_prestasi != ''): ?>
              <img src="<?= base_url('asset/backend/upload/prestasi_mahasiswa/'.$datanya->foto_prestasi);?>" alt="" class="img-rounded" style="width: 100%; height: 540px;">
            <?php else: ?>
            <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 540px;">
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama Prestasi</td>
                  <td><b><?= $datanya->nama_prestasi;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tanggal</td>
                  <td><b><?= tgl_indo($datanya->date_prestasi);?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tempat</td>
                  <td><b><?= $datanya->tempat_prestasi;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Peringkat</td>
                  <td><b><?= $datanya->peringkat_prestasi;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Anggota</td>
                  <td><b><?= $datanya->anggota_prestasi;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Text</td>
                  <td><b><?= strip_tags($datanya->text_prestasi);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/prestasi_mahasiswa');?>';return false;">Kembali</button>
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