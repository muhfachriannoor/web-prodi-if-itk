<?php ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Info Sub Menu
      <!-- <small>Preview</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Sub Menu</a></li>
      <li class="active">Info Sub Menu</li>
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
          <div class="col-md-12">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td width="20%">Menu</td>
                  <td><b><?= $datanya->nameMenu;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Nama Sub Menu</td>
                  <td><b><?= $datanya->nameSubMenu;?></b></td>
                </tr>
                <tr>
                  <td width="20%">Isi Konten</td>
                  <td><b><?= $datanya->kolom1;?></b></td>
                </tr>
                <tr>
                  <td width="20%">
                    <button type="cancel" class="btn btn-danger" onclick="window.location='<?= site_url('backend/submenu');?>';return false;">Kembali</button>
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