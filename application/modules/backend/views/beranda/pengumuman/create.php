<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Pengumuman
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Pengumuman</a></li>
      <li class="active">Tambah Pengumuman</li>
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
      <form action="<?= site_url('backend/beranda/pengumuman/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('judul_pengumuman') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul <b><?= strip_tags(form_error('judul_pengumuman'));?></b></label>
                  <input type="text" name="judul_pengumuman" class="form-control" required="required" placeholder="Isi Judul...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul_pengumuman" class="form-control" required="required" placeholder="Isi Judul..." value="<?= set_value('judul_pengumuman');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_pengumuman') == TRUE): ?>
                  <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 600 x 850</code> <b><?= strip_tags(form_error('foto_pengumuman'));?></b></label>
                    <input type="file" name="foto_pengumuman" class="form-control">
                  </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 600 x 850</code></label>
                  <input type="file" name="foto_pengumuman" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_pengumuman') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Isi <b><?= strip_tags(form_error('text_pengumuman'));?></b></label>
                  <textarea id="editor1" name="text_pengumuman" rows="10" cols="80" required="required" placeholder="Isi...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Isi</label>
                  <textarea id="editor1" name="text_pengumuman" rows="10" cols="80" required="required" placeholder="Isi....">
                    <?= set_value('text_pengumuman');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/pengumuman');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>