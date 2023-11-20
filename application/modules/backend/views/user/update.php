<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah User
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">User</a></li>
      <li class="active">Ubah User</li>
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
      <form action="<?= site_url('backend/user/update/down/'.$datanya->idUser);?>" method="post" enctype="multipart/form-data">
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
              <?php if(form_error('nama_user') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Nama Lengkap <b><?= strip_tags(form_error('nama_user'));?></b></label>
                  <input type="text" name="nama_user" class="form-control" required="required" placeholder="Isi Nama Lengkap...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_user" class="form-control" required="required" placeholder="Isi Nama Lengkap..." value="<?= $datanya->nama_user;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('username') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Username <b><?= strip_tags(form_error('username'));?></b></label>
                  <input type="text" name="username" class="form-control" required="required" placeholder="Isi Username...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" required="required" placeholder="Isi Username..." value="<?= $datanya->username?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('password') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Password <b><?= strip_tags(form_error('password'));?></b></label>
                  <input type="password" name="password" class="form-control" required="required" placeholder="******">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="******">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php if(form_error('email') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Email <b><?= strip_tags(form_error('email'));?></b></label>
                  <input type="email" name="email" class="form-control" required="required" placeholder="email@gmail.com">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required="required" placeholder="email@gmail.com" value="<?= $datanya->email;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if(form_error('akses') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Level Akun <b><?= strip_tags(form_error('akses'));?></b></label>
                  <select name="akses" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH LEVEL AKUN --</option>
                    <option value="1">Administrator</option>
                    <option value="2">Dosen</option>
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Level Akun</label>
                  <select name="akses" class="form-control" required="required" <?= ($this->session->userdata('akses') == '2') ? 'disabled="disabled"' : '';?>>
                    <option value="none" hidden="hidden">-- PILIH LEVEL AKUN --</option>
                    <option value="1" <?= ($datanya->akses == '1') ? 'selected="selected"' : '';?>>Administrator</option>
                    <option value="2" <?= ($datanya->akses == '2') ? 'selected="selected"' : '';?>>Dosen</option>
                  </select>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-4">
              <?php if($error == TRUE OR form_error('foto_user') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Foto <code>Minimum 300 x 300</code> <b><?= strip_tags(form_error('foto_user'));?></b></label>
                  <input type="file" name="foto_user" class="form-control">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Foto <code>Minimum 300 x 300</code></label>
                  <input type="file" name="foto_user" class="form-control">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <input type="hidden" name="old_password" value="<?= $datanya->password;?>">
          <input type="hidden" name="old_akses" value="<?= $datanya->akses;?>">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/user');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>