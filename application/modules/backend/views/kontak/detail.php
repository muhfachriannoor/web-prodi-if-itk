<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Kontak
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kontak</a></li>
      <li class="active">Info Kontak</li>
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
          <div class="col-md-5">
            <iframe id="gmap_canvas" src="<?= $datanya->gmap;?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="300px"></iframe>
          </div>
          <div class="col-md-7">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Email</td>
                  <td><b><?= $datanya->email;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Telpon</td>
                  <td><b><?= $datanya->telpon;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Facebook</td>
                  <td><a href="<?= $datanya->facebook;?>" target="_blank"><b><?= $datanya->facebook;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">Twitter</td>
                  <td><a href="<?= $datanya->twitter;?>" target="_blank"><b><?= $datanya->twitter;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">Youtube</td>
                  <td><a href="<?= $datanya->youtube;?>" target="_blank"><b><?= $datanya->youtube;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">Instagram</td>
                  <td><a href="<?= $datanya->instagram;?>" target="_blank"><b><?= $datanya->instagram;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kontak');?>';return false;">Kembali</button>
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