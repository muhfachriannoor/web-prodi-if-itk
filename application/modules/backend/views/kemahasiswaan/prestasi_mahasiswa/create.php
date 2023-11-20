<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Prestasi Mahasiswa
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Prestasi Mahasiswa</a></li>
      <li class="active">Tambah Prestasi Mahasiswa</li>
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
      <form action="<?= site_url('backend/kemahasiswaan/prestasi_mahasiswa/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nama_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Prestasi <b><?= strip_tags(form_error('nama_prestasi'));?></b></label>
                  <input type="text" name="nama_prestasi" class="form-control" required="required" placeholder="Isi Nama Prestasi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Prestasi</label>
                  <input type="text" name="nama_prestasi" class="form-control" required="required" placeholder="Isi Nama Prestasi..." value="<?= set_value('nama_prestasi');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('date_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tanggal <b><?= strip_tags(form_error('date_prestasi'));?></b></label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="date_prestasi" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="date_prestasi" class="form-control pull-right" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required="required" value="<?= set_value('date_prestasi');?>">
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('tempat_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tempat <b><?= strip_tags(form_error('tempat_prestasi'));?></b></label>
                  <input type="text" name="tempat_prestasi" class="form-control" required="required" placeholder="Isi Tempat...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" name="tempat_prestasi" class="form-control" required="required" placeholder="Isi Tempat..." value="<?= set_value('tempat_prestasi');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('peringkat_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Peringkat <b><?= strip_tags(form_error('peringkat_prestasi'));?></b></label>
                  <input type="text" name="peringkat_prestasi" class="form-control" required="required" placeholder="Isi Peringkat...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Peringkat</label>
                  <input type="text" name="peringkat_prestasi" class="form-control" required="required" placeholder="Isi Peringkat..." value="<?= set_value('peringkat_prestasi');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 900 x 540</code> <b><?= strip_tags(form_error('foto_prestasi'));?></b></label>
                  <input type="file" name="foto_prestasi" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 900 x 540</code></label>
                  <input type="file" name="foto_prestasi" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('anggota_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Anggota Prestasi <code>*(NIM) NAMA</code> <b><?= strip_tags(form_error('anggota_prestasi'));?></b></label>
                  <textarea id="editor1" name="anggota_prestasi" rows="10" cols="80" required="required" placeholder="Isi Anggota...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Anggota Prestasi <code>*(NIM) NAMA</code></label>
                  <textarea id="editor1" name="anggota_prestasi" rows="10" cols="80" required="required" placeholder="Isi Anggota Prestasi....">
                    <?= set_value('anggota_prestasi');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_prestasi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_prestasi'));?></b></label>
                  <textarea id="editor2" name="text_prestasi" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text</label>
                  <textarea id="editor2" name="text_prestasi" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= set_value('text_prestasi');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/prestasi_mahasiswa');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>