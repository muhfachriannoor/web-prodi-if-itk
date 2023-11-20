<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Ubah Profile Lulusan
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Akademik</a></li>
      <li><a href="#">Profile Lulusan</a></li>
      <li class="active">Ubah Profile Lulusan</li>
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
      <form action="<?= site_url('backend/akademik/biaya_kuliah/update/down/'.$datanya->idBiayaKuliah);?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('jalur_biaya') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Jalur <b><?= strip_tags(form_error('jalur_biaya'));?></b></label>
                  <select name="jalur_biaya" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH JALUR BIAYA --</option>
                    <option value="SBMPTN/SNMPTN">SBMPTN/SNMPTN</option>
                    <option value="Mandiri">Mandiri</option>
                  </select>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Jalur</label>
                  <select name="jalur_biaya" class="form-control" required="required">
                    <option value="none" hidden="hidden">-- PILIH JALUR BIAYA --</option>
                    <option value="SBMPTN/SNMPTN" <?= ($datanya->jalur_biaya == 'SBMPTN/SNMPTN') ? 'selected="selected"' : '';?>>SBMPTN/SNMPTN</option>
                    <option value="Mandiri" <?= ($datanya->jalur_biaya == 'Mandiri') ? 'selected="selected"' : '';?>>Mandiri</option>
                  </select>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('kategori_biaya') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Kategori UKT <b><?= strip_tags(form_error('kategori_biaya'));?></b></label>
                  <input type="text" name="kategori_biaya" class="form-control" placeholder="Isi Kategori UKT...">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Kategori UKT</label>
                  <input type="text" name="kategori_biaya" class="form-control" placeholder="Isi Kategori UKT..." value="<?= $datanya->kategori_biaya;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?php if(form_error('tarif_biaya') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tarif UKT <b><?= strip_tags(form_error('tarif_biaya'));?></b></label>
                  <input type="number" name="tarif_biaya" class="form-control" required="required" placeholder="0000">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tarif UKT</label>
                  <input type="number" name="tarif_biaya" class="form-control" required="required" placeholder="0000" value="<?= $datanya->tarif_biaya;?>">
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if(form_error('tarif_spi_biaya') == TRUE): ?>
                <div class="form-group has-warning">
                  <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Tarif SPI <b><?= strip_tags(form_error('tarif_spi_biaya'));?></b></label>
                  <input type="text" name="tarif_spi_biaya" class="form-control" placeholder="0000">
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label>Tarif SPI</label>
                  <input type="text" name="tarif_spi_biaya" class="form-control" placeholder="0000" value="<?= $datanya->tarif_spi_biaya;?>">
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="box-footer text-center">
          <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
          <button type="reset" class="btn btn-warning" value="reset">Ulang</button>
          <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/akademik/biaya_kuliah');?>';return false;">Batal</button>
        </div>
      </form>
    </div>
  </section>
</div>