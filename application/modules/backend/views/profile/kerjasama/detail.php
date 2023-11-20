<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Kerjasama
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Kerjasama</a></li>
      <li class="active">Info Kerjasama</li>
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
          <div class="col-md-5">
            <?php if($datanya->file_kerjasama != ''): ?>
              <img src="<?= base_url('asset/backend/upload/kerjasama/'.$datanya->file_kerjasama);?>" alt="" class="img-rounded" style="width: 100%; height: 400px;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 400px;">
            <?php endif; ?>
          </div>
          <div class="col-md-7">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama Kerjasama</td>
                  <td><b><?= $datanya->nama_kerjasama;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Deskripsi Kerjasama</td>
                  <td><b><?= strip_tags($datanya->deskripsi_kerjasama);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/kerjasama');?>';return false;">Kembali</button>
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