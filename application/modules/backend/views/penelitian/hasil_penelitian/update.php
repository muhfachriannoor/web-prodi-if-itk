<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Hasil Penelitian
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Penelitian & Pengabdian</a></li>
      <li><a href="#">Hasil Penelitian</a></li>
      <li class="active">Ubah Hasil Penelitian</li>
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
      <form action="<?= site_url('backend/penelitian/hasil_penelitian/update/down/'.$datanya->id_penelitian);?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('judul_penelitian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul Penelitian <b><?= strip_tags(form_error('judul_penelitian'));?></b></label>
                  <input type="text" name="judul_penelitian" class="form-control" required="required" placeholder="Isi Judul Penelitian...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul Penelitian</label>
                  <input type="text" name="judul_penelitian" class="form-control" required="required" placeholder="Isi Judul Penelitian..." value="<?= $datanya->judul_penelitian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('tahun_penelitian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tahun <b><?= strip_tags(form_error('tahun_penelitian'));?></b></label>
                  <input type="number" name="tahun_penelitian" class="form-control" required="required" placeholder="20xx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="number" name="tahun_penelitian" class="form-control" required="required" placeholder="20xx" value="<?= $datanya->tahun_penelitian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('sumberdana_penelitian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Sumber Dana <b><?= strip_tags(form_error('sumberdana_penelitian'));?></b></label>
                  <input type="text" name="sumberdana_penelitian" class="form-control" required="required" placeholder="Isi Sumber Dana...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Sumber Dana</label>
                  <input type="text" name="sumberdana_penelitian" class="form-control" required="required" placeholder="Isi Sumber Dana..." value="<?= $datanya->sumberdana_penelitian;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if($error == TRUE OR form_error('foto_penelitian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 900 x 540</code> <b><?= strip_tags(form_error('foto_penelitian'));?></b></label>
                  <input type="file" name="foto_penelitian" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 900 x 540</code></label>
                  <input type="file" name="foto_penelitian" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_penelitian') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_penelitian'));?></b></label>
                  <textarea id="editor1" name="text_penelitian" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea id="editor1" name="text_penelitian" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= $datanya->text_penelitian;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/penelitian/hasil_penelitian');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>