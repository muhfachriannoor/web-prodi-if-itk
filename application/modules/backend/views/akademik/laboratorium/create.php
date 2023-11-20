<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Laboratorium
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Laboratorium</a></li>
      <li class="active">Tambah Laboratorium</li>
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
      <form action="<?= site_url('backend/akademik/laboratorium/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nama_laboratorium') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Laboratorium <b><?= strip_tags(form_error('nama_laboratorium'));?></b></label>
                  <input type="text" name="nama_laboratorium" class="form-control" required="required" placeholder="Isi Nama Laboratorium...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Laboratorium</label>
                  <input type="text" name="nama_laboratorium" class="form-control" required="required" placeholder="Isi Nama Laboratorium..." value="<?= set_value('nama_laboratorium');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_laboratorium') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 640 x 480</code> <b><?= strip_tags(form_error('foto_laboratorium'));?></b></label>
                  <input type="file" name="foto_laboratorium" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 640 x 480</code></label>
                  <input type="file" name="foto_laboratorium" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('deskripsi_laboratorium') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Deskripsi <b><?= strip_tags(form_error('deskripsi_laboratorium'));?></b></label>
                  <textarea id="editor1" name="deskripsi_laboratorium" rows="10" cols="80" required="required" placeholder="Isi Deskripsi...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea id="editor1" name="deskripsi_laboratorium" rows="10" cols="80" required="required" placeholder="Isi Deskripsi...."><?= set_value('deskripsi_laboratorium');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/laboratorium');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>