<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Hasil Pengabdian
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Penelitian & Pengabdian</a></li>
      <li><a href="#">Hasil Pengabdian</a></li>
      <li class="active">Ubah Hasil Pengabdian</li>
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
      <form action="<?= site_url('backend/penelitian/hasil_pengabdian/update/down/'.$datanya->id_pengabdian);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <?php if(form_error('judul_pengabdian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul Pengabdian <b><?= strip_tags(form_error('judul_pengabdian'));?></b></label>
                  <input type="text" name="judul_pengabdian" class="form-control" required="required" placeholder="Isi Judul Pengabdian...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul Pengabdian</label>
                  <input type="text" name="judul_pengabdian" class="form-control" required="required" placeholder="Isi Judul Pengabdian..." value="<?= $datanya->judul_pengabdian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('tahun_pengabdian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun <b><?= strip_tags(form_error('tahun_pengabdian'));?></b></label>
                  <input type="number" name="tahun_pengabdian" class="form-control" required="required" placeholder="20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="number" name="tahun_pengabdian" class="form-control" required="required" placeholder="20xx" value="<?= $datanya->tahun_pengabdian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('sumberdana_pengabdian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Sumber Dana <b><?= strip_tags(form_error('sumberdana_pengabdian'));?></b></label>
                  <input type="text" name="sumberdana_pengabdian" class="form-control" required="required" placeholder="Isi Sumber Dana...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Sumber Dana</label>
                  <input type="text" name="sumberdana_pengabdian" class="form-control" required="required" placeholder="Isi Sumber Dana..." value="<?= $datanya->sumberdana_pengabdian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if($error == TRUE OR form_error('foto_pengabdian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 900 x 540</code> <b><?= strip_tags(form_error('foto_pengabdian'));?></b></label>
                  <input type="file" name="foto_pengabdian" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 900 x 540</code></label>
                  <input type="file" name="foto_pengabdian" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_pengabdian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_pengabdian'));?></b></label>
                  <textarea id="editor1" name="text_pengabdian" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea id="editor1" name="text_pengabdian" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= $datanya->text_pengabdian;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/penelitian/hasil_pengabdian');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>