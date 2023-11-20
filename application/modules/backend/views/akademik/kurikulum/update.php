<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Kurikulum
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Kurikulum</a></li>
      <li class="active">Ubah Kurikulum</li>
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
      <form action="<?= site_url('backend/akademik/kurikulum/update/down/'.$datanya->idKurikulum);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('jenis_kurikulum') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jenis Kurikulum <b><?= strip_tags(form_error('jenis_kurikulum'));?></b></label>
                  <select name="jenis_kurikulum" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH JENIS KURIKULUM --</option>
                    <option value="Mata Kuliah Semester">Mata Kuliah Semester</option>
                    <option value="Mata Kuliah Keminatan">Mata Kuliah Keminatan</option>
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jenis Kurikulum</label>
                  <select name="jenis_kurikulum" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH JENIS KURIKULUM --</option>
                    <option value="Mata Kuliah Semester" <?= ($datanya->jenis_kurikulum == 'Mata Kuliah Semester') ? 'selected="selected"' : '' ;?>>Mata Kuliah Semester</option>
                    <option value="Mata Kuliah Keminatan" <?= ($datanya->jenis_kurikulum == 'Mata Kuliah Keminatan') ? 'selected="selected"' : '' ;?>>Mata Kuliah Keminatan</option>
                  </select>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/kurikulum');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>