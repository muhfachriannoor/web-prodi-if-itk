<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Grup Penelitian
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Penelitian & Pengabdian</a></li>
      <li><a href="#">Grup Penelitian</a></li>
      <li class="active">Tambah Grup Penelitian</li>
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
      <form action="<?= site_url('backend/penelitian/grup_penelitian/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('nama_grup') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Grup Penelitian <b><?= strip_tags(form_error('nama_grup'));?></b></label>
                  <input type="text" name="nama_grup" class="form-control" required="required" placeholder="Isi Nama Grup Penelitian...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Grup Penelitian</label>
                  <input type="text" name="nama_grup" class="form-control" required="required" placeholder="Isi Nama Grup Penelitian..." value="<?= set_value('nama_grup');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('deskripsi_grup') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Deskripsi <b><?= strip_tags(form_error('deskripsi_grup'));?></b></label>
                  <textarea id="editor1" name="deskripsi_grup" rows="10" cols="80" required="required" placeholder="Isi Deskripsi...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea id="editor1" name="deskripsi_grup" rows="10" cols="80" required="required" placeholder="Isi Deskripsi....">
                    <?= set_value('deskripsi_grup');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/penelitian/grup_penelitian');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>