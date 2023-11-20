<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Dosen dan Tenaga Pendidik
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Dosen dan Tenaga Pendidik</a></li>
      <li class="active">Tambah Dosen dan Tenaga Pendidik</li>
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
      <form action="<?= site_url('backend/profile/dosen/create/up');?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nip_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> NIP <b><?= strip_tags(form_error('nip_dosen'));?></b></label>
                  <input type="text" name="nip_dosen" class="form-control" required="required" placeholder="Isi NIP...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="nip_dosen" class="form-control" required="required" placeholder="Isi NIP..." value="<?= set_value('nip_dosen');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('nama_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama <b><?= strip_tags(form_error('nama_dosen'));?></b></label>
                  <input type="text" name="nama_dosen" class="form-control" required="required" placeholder="Isi Nama...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama_dosen" class="form-control" required="required" placeholder="Isi Nama..." value="<?= set_value('nama_dosen');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('jabatan_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jabatan <b><?= strip_tags(form_error('jabatan_dosen'));?></b></label>
                  <input type="text" name="jabatan_dosen" class="form-control" required="required" placeholder="Isi Jabatan...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan_dosen" class="form-control" required="required" placeholder="Isi Jabatan..." value="<?= set_value('jabatan_dosen');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('gschoolar') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Google Scholar <b><?= strip_tags(form_error('gschoolar'));?></b></label>
                  <input type="text" name="gschoolar" class="form-control" placeholder="Isi Google Scholar...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Google Scholar</label>
                  <input type="text" name="gschoolar" class="form-control" placeholder="Isi Google Scholar..." value="<?= set_value('gschoolar');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('linkedin') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> LinkedIn <b><?= strip_tags(form_error('linkedin'));?></b></label>
                  <input type="text" name="linkedin" class="form-control" placeholder="Isi LinkedIn...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>LinkedIn</label>
                  <input type="text" name="linkedin" class="form-control" placeholder="Isi LinkedIn..." value="<?= set_value('linkedin');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('scopus') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Scopus <b><?= strip_tags(form_error('scopus'));?></b></label>
                  <input type="text" name="scopus" class="form-control" placeholder="Isi Scopus...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Scopus</label>
                  <input type="text" name="scopus" class="form-control" placeholder="Isi Scopus..." value="<?= set_value('scopus');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('email_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Email <b><?= strip_tags(form_error('email_dosen'));?></b></label>
                  <input type="email" name="email_dosen" class="form-control" required="required" placeholder="dosen@mail.com">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email_dosen" class="form-control" required="required" placeholder="dosen@mail.com" value="<?= set_value('email_dosen');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 300 x 300</code> <b><?= strip_tags(form_error('foto_dosen'));?></b></label>
                  <input type="file" name="foto_dosen" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 300 x 300</code></label>
                  <input type="file" name="foto_dosen" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_dosen') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Sekilas Dosen <b><?= strip_tags(form_error('text_dosen'));?></b></label>
                  <textarea name="text_dosen" class="form-control" placeholder="Isi Sekilas Dosen..." rows="5"></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Sekilas Dosen</label>
                  <textarea name="text_dosen" class="form-control" placeholder="Isi Sekilas Dosen..." rows="5"><?= set_value('text_dosen');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/dosen');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>