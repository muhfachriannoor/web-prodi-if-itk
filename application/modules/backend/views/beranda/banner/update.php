<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Banner
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Banner</a></li>
      <li class="active">Ubah Banner</li>
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
      <form action="<?= site_url('backend/beranda/banner/update/down/'.$datanya->id_banner);?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
          <?= $error; ?>
        </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('judul_banner') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul <b><?= strip_tags(form_error('judul_banner'));?></b></label>
                  <input type="text" name="judul_banner" class="form-control" required="required" placeholder="Isi Judul..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul_banner" class="form-control" required="required" placeholder="Isi Judul..." value="<?= $datanya->judul_banner;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Link Url</label>
                <input type="text" name="url" class="form-control" placeholder="https://www.google.com" value="<?= $datanya->url;?>">
              </div>
            </div>
            <div class="col-md-4">
              <?php if($error == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 1280 x 720</code> <?= strip_tags(form_error('foto_banner'));?></label>
                  <input type="file" name="foto_banner" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 1280 x 720</code></label>
                  <input type="file" name="foto_banner" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_banner') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_banner'));?></b></label>
                  <textarea id="editor1" name="text_banner" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text <?= form_error('text_banner');?></label>
                  <textarea id="editor1" name="text_banner" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= $datanya->text_banner;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/banner');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>