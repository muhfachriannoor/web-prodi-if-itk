<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Sejarah
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Sejarah</a></li>
      <li class="active">Ubah Sejarah</li>
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
      <form action="<?= site_url('backend/profile/sejarah/update/down/'.$datanya->id_sejarah);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_sejarah') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text Sejarah <b><?= strip_tags(form_error('text_sejarah'));?></b></label>
                  <textarea id="editor1" name="text_sejarah" rows="20" cols="100" required="required" placeholder="Isi Text Sejarah...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text Sejarah</label>
                  <textarea id="editor1" name="text_sejarah" rows="20" cols="100" required="required" placeholder="Isi Text Sejarah...."><?= $datanya->sejarah_text;?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/sejarah');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>