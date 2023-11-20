<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Program Kreativitas Mahasiswa
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Kemahasiswaan</a></li>
      <li><a href="#">Program Kreativitas Mahasiswa</a></li>
      <li class="active">Info Program Kreativitas Mahasiswa</li>
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
          <div class="col-md-6">
            <?php if($datanya->foto_pkm != ''): ?>
              <img src="<?= base_url('asset/backend/upload/pkm/'.$datanya->foto_pkm);?>" alt="" class="img-rounded" style="width: 100%; height: 600px;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default.png');?>" alt="" class="img-rounded" style="width: 100%; height: 600px;">
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Nama Program</td>
                  <td><b><?= $datanya->nama_pkm;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Jenis</td>
                  <td><b><?= $datanya->jenis_pkm;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Tahun</td>
                  <td><b><?= $datanya->tahun_pkm;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Ketua</td>
                  <td><b><?= $datanya->ketua_pkm;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Anggota</td>
                  <td><b><?= $datanya->anggota_pkm;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Text</td>
                  <td><b><?= strip_tags($datanya->text_pkm);?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/kemahasiswaan/pkm');?>';return false;">Kembali</button>
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