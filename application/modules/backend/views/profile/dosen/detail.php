<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Dosen dan Tenaga Pendidik
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Profile Prodi</a></li>
      <li><a href="#">Dosen dan Tenaga Pendidik</a></li>
      <li class="active">Info Dosen dan Tenaga Pendidik</li>
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
          <div class="text-center">
            <a href="<?= site_url('backend/profile/dosen/pendidikan/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Pendidikan</button>
            </a>
            <a href="<?= site_url('backend/profile/dosen/keahlian/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Keahlian</button>
            </a>
            <a href="<?= site_url('backend/profile/dosen/minatpenelitian/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Minat Penelitian</button>
            </a>
            <a href="<?= site_url('backend/profile/dosen/publikasi/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Publikasi</button>
            </a>
            <a href="<?= site_url('backend/profile/dosen/penelitian/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Proyek Penelitian</button>
            </a>
            <a href="<?= site_url('backend/profile/dosen/pengalaman/'.$datanya->idDosen);?>">
              <button type="button" class="btn btn-primary">Pengalaman</button>
            </a>
          </div>
        </div><br><br><br>
        <div class="row">
          <div class="col-md-4">
            <?php if($datanya->foto_dosen != ''): ?>
              <img src="<?= base_url('asset/backend/upload/dosen/'.$datanya->foto_dosen);?>" alt="" class="img-rounded" style="width: 100%; height: 300px; object-fit: cover;">
            <?php else: ?>
              <img src="<?= base_url('asset/backend/upload/default-user.png');?>" alt="" class="img-rounded" style="width: 100%; height: 300px; object-fit: cover;">
            <?php endif; ?>
          </div>
          <div class="col-md-8">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">NIP</td>
                  <td><b><?= $datanya->nip_dosen?></b></td>
                </tr>
                <tr>
                  <td width="20%">Nama</td>
                  <td><b><?= $datanya->nama_dosen?></b></td>
                </tr>
                <tr>
                  <td width="20%">Jabatan</td>
                  <td><b><?= $datanya->jabatan_dosen?></b></td>
                </tr>
                <tr>
                  <td width="20%">Email</td>
                  <td><b><?= $datanya->email_dosen?></b></td>
                </tr>
                <tr>
                  <td width="20%">Google Scholar</td>
                  <td><a href="<?= $datanya->gschoolar;?>" target="_blank"><b><?= $datanya->gschoolar;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">LinkedIn</td>
                  <td><a href="<?= $datanya->linkedin;?>" target="_blank"><b><?= $datanya->linkedin;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">Scopus</td>
                  <td><a href="<?= $datanya->scopus;?>" target="_blank"><b><?= $datanya->scopus;?></b></a></td>
                </tr>
                <tr>
                  <td width="20%">Sekilas Dosen</td>
                  <td><b><?= $datanya->text_dosen?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/profile/dosen');?>';return false;">Kembali</button>
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