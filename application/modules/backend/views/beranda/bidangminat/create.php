<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Bidang Minat
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">Bidang Minat</a></li>
      <li class="active">Tambah Bidang Minat</li>
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
      <form action="<?= site_url('backend/beranda/bidangminat/create/up');?>" method="post" enctype="multipart/form-data">
        <?php if($error == TRUE): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
            <?= $error; ?>
          </div>
        <?php endif; ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('nama_bidangminat') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Bidang Minat <b><?= strip_tags(form_error('nama_bidangminat'));?></b></label>
                  <input type="text" name="nama_bidangminat" class="form-control" required="required" placeholder="Isi Nama Bidang Minat..." id="inputWarning">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Bidang Minat</label>
                  <input type="text" name="nama_bidangminat" class="form-control" required="required" placeholder="Isi Nama Bidang Minat..." value="<?= set_value('nama_bidangminat');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($error == TRUE OR form_error('foto_bidangminat') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 320 x 200</code> <?= strip_tags(form_error('foto_bidangminat'));?></label>
                  <input type="file" name="foto_bidangminat" class="form-control" required="required">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 320 x 200</code></label>
                  <input type="file" name="foto_bidangminat" class="form-control" required="required">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('text_bidangminat') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Text <b><?= strip_tags(form_error('text_bidangminat'));?></b></label>
                  <textarea id="editor1" name="text_bidangminat" rows="10" cols="80" required="required" placeholder="Isi Text...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Text <?= form_error('text_bidangminat');?></label>
                  <textarea id="editor1" name="text_bidangminat" rows="10" cols="80" required="required" placeholder="Isi Text....">
                    <?= set_value('text_bidangminat');?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/bidangminat');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>