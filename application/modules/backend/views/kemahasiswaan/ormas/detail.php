<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Organisasi Kemahasiswaan
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Organisasi Kemahasiswaan</a></li>
      <li class="active">Info Organisasi Kemahasiswaan</li>
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
            <?php if($datanya->foto_ormas != ''): ?>
              <img src="<?= base_url('asset/backend/upload/ormas/'.$datanya->foto_ormas);?>" alt="" class="img-rounded" style="width: 400px; height: 500px;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 500px;">
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama Organisasi Kemahasiswaan</td>
                  <td><b><?= $datanya->nama_ormas;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Deskripsi</td>
                  <td><b><?= strip_tags($datanya->deskripsi_ormas);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/ormawa');?>';return false;">Kembali</button>
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