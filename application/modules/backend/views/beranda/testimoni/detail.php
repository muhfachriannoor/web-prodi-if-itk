<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Testimoni
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Testimoni</a></li>
      <li class="active">Info Testimoni</li>
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
            <img src="<?= base_url('asset/backend/upload/testimoni/'.$datanya->foto_testimoni);?>" alt="" class="img-rounded" style="width: 400px; height: 500px;">
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama</td>
                  <td><b><?= $datanya->nama;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Posisi</td>
                  <td><b><?= $datanya->posisi;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Testimoni</td>
                  <td><b><?= strip_tags($datanya->testimoni);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/testimoni');?>';return false;">Kembali</button>
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