<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah File Kalender Akademik
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">File Kalender Akademik</a></li>
      <li class="active">Tambah File Kalender Akademik</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <form action="<?= site_url('backend/akademik/kalender_akademik_file/create/up');?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
            <?= $error; ?>
          </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('tahun_ajaran') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun Ajaran <b><?= strip_tags(form_error('tahun_ajaran'));?></b></label>
                  <input type="text" name="tahun_ajaran" class="form-control" required="required" placeholder="20xx/20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <input type="text" name="tahun_ajaran" class="form-control" required="required" placeholder="20xx/20xx" value="<?= set_value('tahun_ajaran');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('file_kalender') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> File Kalender <b><?= strip_tags(form_error('file_kalender'));?></b></label>
                  <input type="file" name="file_kalender" class="form-control" required="required">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>File Kalender</label>
                  <input type="file" name="file_kalender" class="form-control" required="required">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/kalender_akademik');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>