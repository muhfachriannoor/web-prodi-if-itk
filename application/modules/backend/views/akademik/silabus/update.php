<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Silabus
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Silabus</a></li>
      <li class="active">Ubah Silabus</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Ubah</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <form action="<?= site_url('backend/akademik/silabus/update/down/'.$datanya->id_silabus);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if($error == TRUE OR form_error('file_silabus') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> File Silabus <b><?= strip_tags(form_error('file_silabus'));?></b></label>
                  <input type="file" name="file_silabus" class="form-control" required="required">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>File Silabus</label>
                  <input type="file" name="file_silabus" class="form-control" required="required">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <input type="hidden" name="tglrilis_silabus" value="<?= date('Y-m-d H:i:s');?>">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/silabus');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>