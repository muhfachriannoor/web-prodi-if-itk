<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Kontak
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kontak</a></li>
      <li class="active">Tambah Kontak</li>
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
      <form action="<?= site_url('backend/kontak/create/up');?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('email') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Email <b><?= strip_tags(form_error('email'));?></b></label>
                  <input type="email" name="email" class="form-control" required="required" placeholder="email@mail.com">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required="required" placeholder="email@mail.com" value="<?= set_value('email');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('telpon') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Telpon <b><?= strip_tags(form_error('telpon'));?></b></label>
                  <input type="text" name="telpon" class="form-control" required="required" placeholder="0541xxx">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Telpon</label>
                  <input type="text" name="telpon" class="form-control" required="required" placeholder="0541xxx" value="<?= set_value('telpon');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('gmap') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link Google Maps <b><?= strip_tags(form_error('gmap'));?></b></label>
                  <input type="text" name="gmap" class="form-control" required="required" placeholder="Isi Link Google Maps...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link Google Maps</label>
                  <input type="text" name="gmap" class="form-control" required="required" placeholder="Isi Link Google Maps..." value="<?= set_value('gmap');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('facebook') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link Facebook <b><?= strip_tags(form_error('facebook'));?></b></label>
                  <input type="text" name="facebook" class="form-control" placeholder="Isi Link Facebook...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link Facebook</label>
                  <input type="text" name="facebook" class="form-control" placeholder="Isi Link Facebook..." value="<?= set_value('facebook');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('twitter') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link Twitter <b><?= strip_tags(form_error('twitter'));?></b></label>
                  <input type="text" name="twitter" class="form-control" placeholder="Isi Link Twitter...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link Twitter</label>
                  <input type="text" name="twitter" class="form-control" placeholder="Isi Link Twitter..." value="<?= set_value('twitter');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('youtube') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link Youtube <b><?= strip_tags(form_error('youtube'));?></b></label>
                  <input type="text" name="youtube" class="form-control" placeholder="Isi Link Youtube...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link Youtube</label>
                  <input type="text" name="youtube" class="form-control" placeholder="Isi Link Youtube..." value="<?= set_value('youtube');?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('instagram') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Link Instagram <b><?= strip_tags(form_error('instagram'));?></b></label>
                  <input type="text" name="instagram" class="form-control" placeholder="Isi Link Instagram...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Link Instagram</label>
                  <input type="text" name="instagram" class="form-control" placeholder="Isi Link Instagram..." value="<?= set_value('instagram');?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php if(form_error('alamat') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Alamat <b><?= strip_tags(form_error('alamat'));?></b></label>
                  <textarea name="alamat" class="form-control" required="required" placeholder="Isi Alamat..." rows="10"></textarea>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" required="required" placeholder="Isi Alamat..." rows="10"><?= set_value('alamat');?></textarea>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kontak');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>