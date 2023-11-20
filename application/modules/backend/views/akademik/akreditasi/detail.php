<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Akreditasi
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Akreditasi</a></li>
      <li class="active">Info Akreditasi</li>
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
            <img src="<?= base_url('asset/backend/upload/akreditasi/'.$datanya->akreditasi_file);?>" alt="" class="img-rounded" style="width: 400px; height: 300px;">
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Deskripsi</td>
                  <td><b><?= strip_tags($datanya->akreditasi_text);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/akreditasi');?>';return false;">Kembali</button>
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