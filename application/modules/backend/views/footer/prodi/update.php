<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Link Prodi
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Footer</a></li>
      <li><a href="#">Link Prodi</a></li>
      <li class="active">Ubah Link Prodi</li>
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
      <form action="<?= site_url('backend/footer/prodi/update/down/'.$datanya->id_prodi);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('nomor_prodi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nomor Prodi <b><?= strip_tags(form_error('nomor_prodi'));?></b></label>
                  <input type="number" name="nomor_prodi" class="form-control" required="required" placeholder="Isi Nomor Prodi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nomor Prodi</label>
                  <input type="number" name="nomor_prodi" class="form-control" required="required" placeholder="Isi Nomor Prodi..." value="<?= $datanya->nomor_prodi;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('nama_prodi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Prodi <b><?= strip_tags(form_error('nama_prodi'));?></b></label>
                  <input type="text" name="nama_prodi" class="form-control" required="required" placeholder="Isi Nama Prodi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Prodi</label>
                  <input type="text" name="nama_prodi" class="form-control" required="required" placeholder="Isi Nama Prodi..." value="<?= $datanya->nama_prodi;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('url_prodi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link <b><?= strip_tags(form_error('url_prodi'));?></b></label>
                  <input type="text" name="url_prodi" class="form-control" required="required" placeholder="Isi Link...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="url_prodi" class="form-control" required="required" placeholder="Isi Link..." value="<?= $datanya->url_prodi;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/footer/prodi');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>