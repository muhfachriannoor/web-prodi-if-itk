<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah FAQ
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Beranda</a></li>
      <li><a href="#">FAQ</a></li>
      <li class="active">Ubah FAQ</li>
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
      <form action="<?= site_url('backend/beranda/testimoni/update/down/'.$datanya->idTestimoni);?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nama') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama <b><?= strip_tags(form_error('nama'));?></b></label>
                  <input type="text" name="nama" class="form-control" required="required" placeholder="Isi Nama...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" required="required" placeholder="Isi Nama..." value="<?= $datanya->nama;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('posisi') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Posisi <b><?= strip_tags(form_error('posisi'));?></b></label>
                  <input type="text" name="posisi" class="form-control" required="required" placeholder="Isi Posisi...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Posisi</label>
                  <input type="text" name="posisi" class="form-control" required="required" placeholder="Isi Posisi..." value="<?= $datanya->posisi;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if($error == TRUE OR form_error('foto_testimoni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 300 x 300</code> <b><?= strip_tags(form_error('foto_testimoni'));?></b></label>
                  <input type="file" name="foto_testimoni" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 300 x 300</code></label>
                  <input type="file" name="foto_testimoni" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('testimoni') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Testimoni <b><?= strip_tags(form_error('testimoni'));?></b></label>
                  <textarea id="editor1" name="testimoni" rows="10" cols="80" required="required" placeholder="Isi Testimoni...."></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Testimoni</label>
                  <textarea id="editor1" name="testimoni" rows="10" cols="80" required="required" placeholder="Isi Testimoni....">
                    <?= $datanya->testimoni;?>
                  </textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/beranda/testimoni');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>