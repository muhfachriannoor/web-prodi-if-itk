<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Visi, Misi, Tujuan, dan Moto
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Visi, Misi, Tujuan, dan Moto</a></li>
      <li class="active">Tambah Visi, Misi, Tujuan, dan Moto</li>
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
      <form action="<?= site_url('backend/profile/visimisi/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_visi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text Visi <b><?= strip_tags(form_error('text_visi'));?></b></label>
                  <textarea id="editor1" name="text_visi" rows="10" cols="80" required="required" placeholder="Isi Text Visi...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text Visi</label>
                  <textarea id="editor1" name="text_visi" rows="10" cols="80" required="required" placeholder="Isi Text Visi...."><?= set_value('text_visi');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_misi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text Misi <b><?= strip_tags(form_error('text_misi'));?></b></label>
                  <textarea id="editor2" name="text_misi" rows="10" cols="80" required="required" placeholder="Isi Text Misi...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text Misi</label>
                  <textarea id="editor2" name="text_misi" rows="10" cols="80" required="required" placeholder="Isi Text Misi...."><?= set_value('text_misi');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Text Tujuan</label>
                <textarea id="editor3" name="text_tujuan" rows="10" cols="80" required="required" placeholder="Isi Text Tujuan...."><?= set_value('text_tujuan');?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Text Motto</label>
                <textarea id="editor4" name="text_motto" rows="10" cols="80" required="required" placeholder="Isi Text Motto...."><?= set_value('text_motto');?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/visimisi');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>