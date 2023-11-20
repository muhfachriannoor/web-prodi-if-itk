<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Kalender Akademik
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Kalender Akademik</a></li>
      <li class="active">Tambah Kalender Akademik</li>
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
      <form action="<?= site_url('backend/akademik/kalender_akademik/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('judul_kalender') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul <b><?= strip_tags(form_error('judul_kalender'));?></b></label>
                  <input type="text" name="judul_kalender" class="form-control" required="required" placeholder="Isi Judul...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul_kalender" class="form-control" required="required" placeholder="Isi Judul..." value="<?= set_value('judul_kalender');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('start_kalender') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Dari Tanggal <b><?= strip_tags(form_error('start_kalender'));?></b></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="start_kalender" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Dari Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="start_kalender" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required" value="<?= set_value('start_kalender');?>">
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('end_kalender') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Sampai Tanggal <b><?= strip_tags(form_error('end_kalender'));?></b></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="end_kalender" class="form-control pull-right" id="datepicker2" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="end_kalender" class="form-control pull-right" id="datepicker2" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required" value="<?= set_value('end_kalender');?>">
                  </div>
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