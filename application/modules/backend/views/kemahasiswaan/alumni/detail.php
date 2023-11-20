<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Alumni
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Alumni</a></li>
      <li class="active">Info Alumni</li>
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
            <img src="<?= base_url('asset/backend/upload/alumni/'.$datanya->foto_alumni);?>" alt="" class="img-rounded" style="width: 250px; height: 300px; object-fit: cover;">
          </div>
          <div class="col-md-8">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">NIM</td>
                  <td><b><?= $datanya->nim_alumni;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Nama</td>
                  <td><b><?= $datanya->nama_alumni;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tahun Masuk</td>
                  <td><b><?= $datanya->tahunmasuk_alumni;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tahun Lulus</td>
                  <td><b><?= $datanya->tahunlulus_alumni;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Jejak</td>
                  <td><b><?= $datanya->jejak;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Text Jejak</td>
                  <td><b><?= strip_tags($datanya->text_jejak);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/alumni');?>';return false;">Kembali</button>
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