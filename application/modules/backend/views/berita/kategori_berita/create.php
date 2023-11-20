<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Kategori Berita
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Berita</a></li>
      <li><a href="#">Kategori Berita</a></li>
      <li class="active">Tambah Kategori Berita</li>
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
      <form action="<?= site_url('backend/berita/kategori_berita/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('nama_kategori') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Kategori <b><?= strip_tags(form_error('nama_kategori'));?></b></label>
                  <input type="text" name="nama_kategori" class="form-control" required="required" placeholder="Isi Nama Kategori...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="nama_kategori" class="form-control" required="required" placeholder="Isi Nama Kategori..." value="<?= set_value('nama_kategori');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/berita/kategori_berita');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>