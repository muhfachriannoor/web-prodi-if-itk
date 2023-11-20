<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Hasil Pengabdian
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Penelitian & Pengabdian</a></li>
      <li><a href="#">Hasil Pengabdian</a></li>
      <li class="active">Info Hasil Pengabdian</li>
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
            <?php if($datanya->foto_pengabdian != ''): ?>
              <img src="<?= base_url('asset/backend/upload/hasil_pengabdian/'.$datanya->foto_pengabdian);?>" alt="" class="img-rounded" style="width: 100%; height: 540px;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 540px;">
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Judul pengabdian</td>
                  <td><b><?= $datanya->judul_pengabdian;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tahun</td>
                  <td><b><?= $datanya->tahun_pengabdian;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Sumber Dana</td>
                  <td><b><?= $datanya->sumberdana_pengabdian;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Text</td>
                  <td><b><?= strip_tags($datanya->text_pengabdian);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/penelitian/hasil_pengabdian');?>';return false;">Kembali</button>
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