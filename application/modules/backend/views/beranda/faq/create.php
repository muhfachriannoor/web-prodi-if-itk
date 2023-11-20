<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah FAQ
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">FAQ</a></li>
      <li class="active">Tambah FAQ</li>
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
      <form action="<?= site_url('backend/beranda/faq/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('question') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Pertanyaan <b><?= strip_tags(form_error('question'));?></b></label>
                  <textarea name="question" class="form-control" required="required" placeholder="Isi Pertanyaan..." rows="10"></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Pertanyaan</label>
                  <textarea name="question" class="form-control" required="required" placeholder="Isi Pertanyaan..." rows="10"><?= set_value('question');?></textarea>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('answer') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jawaban <b><?= strip_tags(form_error('answer'));?></b></label>
                  <textarea name="answer" class="form-control" required="required" placeholder="Isi Jawaban..." rows="10"></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jawaban</label>
                  <textarea name="answer" class="form-control" required="required" placeholder="Isi Jawaban..." rows="10"><?= set_value('answer');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/faq');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>