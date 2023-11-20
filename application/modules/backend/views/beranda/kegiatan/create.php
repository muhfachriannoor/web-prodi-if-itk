<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Kegiatan
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Kegiatan</a></li>
      <li class="active">Tambah Kegiatan</li>
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
      <form action="<?= site_url('backend/beranda/kegiatan/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('judul_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Judul <b><?= strip_tags(form_error('judul_kegiatan'));?></b></label>
                  <input type="text" name="judul_kegiatan" class="form-control" required="required" placeholder="Isi Judul...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul_kegiatan" class="form-control" required="required" placeholder="Isi Judul..." value="<?= set_value('judul_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('jenis_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jenis <b><?= strip_tags(form_error('jenis_kegiatan'));?></b></label>
                  <input type="text" name="jenis_kegiatan" class="form-control" required="required" placeholder="Isi Jenis...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" name="jenis_kegiatan" class="form-control" required="required" placeholder="Isi Jenis..." value="<?= set_value('jenis_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('penyelenggara_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Penyelenggara <b><?= strip_tags(form_error('penyelenggara_kegiatan'));?></b></label>
                  <input type="text" name="penyelenggara_kegiatan" class="form-control" required="required" placeholder="Isi Penyelenggara...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Penyelenggara</label>
                  <input type="text" name="penyelenggara_kegiatan" class="form-control" required="required" placeholder="Isi Penyelenggara..." value="<?= set_value('penyelenggara_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-3">
              <?php if(form_error('materi_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Materi <b><?= strip_tags(form_error('materi_kegiatan'));?></b></label>
                  <input type="text" name="materi_kegiatan" class="form-control" required="required" placeholder="Isi Materi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Materi</label>
                  <input type="text" name="materi_kegiatan" class="form-control" required="required" placeholder="Isi Materi..." value="<?= set_value('materi_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('lokasi_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Lokasi <b><?= strip_tags(form_error('lokasi_kegiatan'));?></b></label>
                  <input type="text" name="lokasi_kegiatan" class="form-control" required="required" placeholder="Isi Lokasi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Lokasi</label>
                  <input type="text" name="lokasi_kegiatan" class="form-control" required="required" placeholder="Isi Lokasi..." value="<?= set_value('lokasi_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('ruang_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Ruang <b><?= strip_tags(form_error('ruang_kegiatan'));?></b></label>
                  <input type="text" name="ruang_kegiatan" class="form-control" required="required" placeholder="Isi Ruang...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Ruang</label>
                  <input type="text" name="ruang_kegiatan" class="form-control" required="required" placeholder="Isi Ruang..." value="<?= set_value('ruang_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('peserta_kegiatan') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Peserta <b><?= strip_tags(form_error('peserta_kegiatan'));?></b></label>
                  <input type="text" name="peserta_kegiatan" class="form-control" required="required" placeholder="Isi Peserta...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Peserta</label>
                  <input type="text" name="peserta_kegiatan" class="form-control" required="required" placeholder="Isi Peserta..." value="<?= set_value('peserta_kegiatan');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('tanggal') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tanggal <b><?= strip_tags(form_error('tanggal'));?></b></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tanggal" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required" value="<?= set_value('tanggal');?>">
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('waktu') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Waktu <b><?= strip_tags(form_error('waktu'));?></b></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="time" name="waktu" class="form-control" data-date-format="h:i:s" placeholder="00:00" required="required">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Waktu</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="time" name="waktu" class="form-control" data-date-format="h:i:s" placeholder="00:00" required="required" value="<?= set_value('waktu');?>">
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if($error == TRUE OR form_error('foto_kegiatan') == TRUE): ?>
                  <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 400 x 400</code> <b><?= strip_tags(form_error('foto_kegiatan'));?></b></label>
                    <input type="file" name="foto_kegiatan" class="form-control">
                  </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 400 x 400</code></label>
                  <input type="file" name="foto_kegiatan" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/kegiatan');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>