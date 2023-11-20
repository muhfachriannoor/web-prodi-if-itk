<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Alumni
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Alumni</a></li>
      <li class="active">Tambah Alumni</li>
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
      <form action="<?= site_url('backend/kemahasiswaan/alumni/create/up');?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
            <?= $error; ?>
          </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <?php if(form_error('nim_alumni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> NIM Alumni <b><?= strip_tags(form_error('nim_alumni'));?></b></label>
                  <input type="number" name="nim_alumni" class="form-control" required="required" placeholder="Isi NIM Alumni...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>NIM Alumni</label>
                  <input type="number" name="nim_alumni" class="form-control" required="required" placeholder="Isi NIM Alumni..." value="<?= set_value('nim_alumni');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('nama_alumni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Alumni <b><?= strip_tags(form_error('nama_alumni'));?></b></label>
                  <input type="text" name="nama_alumni" class="form-control" required="required" placeholder="Isi Nama Alumni...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Alumni</label>
                  <input type="text" name="nama_alumni" class="form-control" required="required" placeholder="Isi Nama Alumni..." value="<?= set_value('nama_alumni');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('tahunmasuk_alumni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun Masuk <b><?= strip_tags(form_error('tahunmasuk_alumni'));?></b></label>
                  <input type="number" name="tahunmasuk_alumni" class="form-control" required="required" placeholder="20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun Masuk</label>
                  <input type="number" name="tahunmasuk_alumni" class="form-control" required="required" placeholder="20xx" value="<?= set_value('tahunmasuk_alumni');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('tahunlulus_alumni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun Lulus <b><?= strip_tags(form_error('tahunlulus_alumni'));?></b></label>
                  <input type="number" name="tahunlulus_alumni" class="form-control" required="required" placeholder="20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun Lulus</label>
                  <input type="number" name="tahunlulus_alumni" class="form-control" required="required" placeholder="20xx" value="<?= set_value('tahunlulus_alumni');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_alumni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 300 x 300</code> <?= strip_tags(form_error('foto_alumni'));?></label>
                  <input type="file" name="foto_alumni" class="form-control" required="required">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 300 x 300</code></label>
                  <input type="file" name="foto_alumni" class="form-control" required="required">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('jejak') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jejak <?= strip_tags(form_error('jejak'));?></label>
                  <input type="text" name="jejak" class="form-control" required="required" placeholder="Isi Jejak...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jejak</label>
                  <input type="text" name="jejak" class="form-control" required="required" placeholder="Isi Jejak..." value="<?= set_value('jejak');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_jejak') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text Jejak <b><?= strip_tags(form_error('text_jejak'));?></b></label>
                  <textarea id="editor1" name="text_jejak" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text Jejak</label>
                  <textarea id="editor1" name="text_jejak" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= set_value('text_jejak');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/alumni');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>