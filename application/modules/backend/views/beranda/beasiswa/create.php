<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Beasiswa
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Beasiswa</a></li>
      <li class="active">Tambah Beasiswa</li>
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
      <form action="<?= site_url('backend/beranda/beasiswa/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nama_beasiswa') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Beasiswa <b><?= strip_tags(form_error('nama_beasiswa'));?></b></label>
                  <input type="text" name="nama_beasiswa" class="form-control" required="required" placeholder="Isi Nama Beasiswa..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Beasiswa</label>
                  <input type="text" name="nama_beasiswa" class="form-control" required="required" placeholder="Isi Nama Beasiswa..." value="<?= set_value('nama_beasiswa');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_beasiswa') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 600 x 850</code> <?= strip_tags(form_error('foto_beasiswa'));?></label>
                  <input type="file" name="foto_beasiswa" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 640 x 480</code></label>
                  <input type="file" name="foto_beasiswa" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_beasiswa') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_beasiswa'));?></b></label>
                  <textarea id="editor1" name="text_beasiswa" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea id="editor1" name="text_beasiswa" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= set_value('text_beasiswa');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/beasiswa');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>