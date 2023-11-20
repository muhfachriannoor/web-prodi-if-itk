<?php  ?>
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 2.4.0 -->
    </div>
    <strong>&copy; 2019 <a href="<?= site_url('beranda');?>" target="_blank">Informatika</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?= base_url('asset/backend/');?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('asset/backend/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/backend/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/backend/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('asset/backend/');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('asset/backend/');?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('asset/backend/');?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('asset/backend/');?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/backend/');?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/backend/');?>dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?= base_url('asset/backend/');?>bower_components/ckeditor/ckeditor.js"></script>
<script src="<?= base_url('asset/backend/');?>ckfinder/ckfinder.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('asset/backend/');?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('asset/backend/');?>plugins/iCheck/icheck.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#data-table').DataTable()
    $('#data-table2').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#timenya').timepicker({
      showInputs: false
    })
    $('#datepicker').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    var editor = CKEDITOR.replace( 'editor1', {
      filebrowserBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    
    var editor = CKEDITOR.replace( 'editor2', {
      filebrowserBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });

    var editor = CKEDITOR.replace( 'editor3', {
      filebrowserBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });

    var editor = CKEDITOR.replace( 'editor4', {
      filebrowserBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : '<?= base_url('asset/backend/');?>ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : '<?= base_url('asset/backend/');?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });

   CKFinder.setupCKEditor( editor, '../' );
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>