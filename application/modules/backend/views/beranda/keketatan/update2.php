<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah UTBK
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Keketatan</a></li>
      <li class="active">Ubah UTBK</li>
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
      <form action="<?= site_url('backend/beranda/keketatan/update/down2/'.$datanya->idKeketatan);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('tahun_keketatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun <b><?= strip_tags(form_error('tahun_keketatan'));?></b></label>
                  <input type="number" name="tahun_keketatan" class="form-control" required="required" placeholder="Isi Tahun...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="number" name="tahun_keketatan" class="form-control" required="required" placeholder="Isi Tahun..." value="<?= $datanya->tahun_keketatan;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('nilai') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nilai <b><?= strip_tags(form_error('nilai'));?></b></label>
                  <input type="number" step="any" name="nilai" class="form-control" required="required" placeholder="000">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nilai</label>
                  <input type="number" step="any" name="nilai" class="form-control" required="required" placeholder="000" value="<?= $datanya->nilai;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/keketatan');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>