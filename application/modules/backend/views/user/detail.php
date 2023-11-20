<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info User
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">User</a></li>
      <li class="active">Info User</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Info</h3>

        <!-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div> -->
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <?php if($datanya->foto_user != ''): ?>
              <img src="<?= base_url('asset/backend/upload/user/'.$datanya->foto_user);?>" alt="" class="img-rounded" style="width: 250px; height: 300px; object-fit: cover;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default-user.png');?>" alt="" class="img-rounded" style="width: 100%; height: 300px; object-fit: cover;">
            <?php endif; ?>
          </div>
          <div class="col-md-8">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama Lengkap</td>
                  <td><b><?= $datanya->nama_user;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Username</td>
                  <td><b><?= $datanya->username;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Email</td>
                  <td><b><?= $datanya->email;?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/user');?>';return false;">Kembali</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>