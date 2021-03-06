<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $first_title; ?> | <?= $second_title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?= base_url(); ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <?= $this->include('layout/user/sidebar') ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <?= $this->renderSection('content'); ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 Computer Damage Diagnosis Expert System.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url(); ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>/assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>/assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(); ?>/assets/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(); ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
  </script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url(); ?>/assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>/assets/dist/js/pages/dashboard.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>/assets/plugins/select2/js/select2.full.min.js"></script>
  <script>
  $(document).ready(function () {
    // get Edit Product
    $('.btn-edit').on('click', function () {
      // get data from button edit
      const id_gejala = $(this).data('id_gejala');
      const gejala = $(this).data('gejala');
      // Set data to Form Edit
      $('.id_gejala').val(id_gejala);
      $('.gejala').val(gejala);
      // Call Modal Edit
      $('#editGejala').modal('show');
    });

    $('.btn-delete').on('click', function () {
      // get data from button delete
      const id_gejala = $(this).data('id_gejala');
      // Set data to Form delete
      $('.id_gejala').val(id_gejala);
      // Call Modal delete
      $('#deleteModal').modal('show');
    });

    $('.btn-view-solusi').on('click', function () {
      var id_solusi = $(this).data('id_solusi');
      var solusi = $(this).data('solusi');
      $('.id_solusi').text(id_solusi);
      $('.solusi').html(solusi).text();
    });

    $('.btn-edit-solusi').on('click', function () {
      var id_solusi = $(this).data('id_solusi');
      var solusi = $(this).data('solusi');
      $('.id_solusi').val(id_solusi);
      $('.solusi').text(solusi).html();    
      $('#summernote2').summernote('code', solusi);
    });

    $('.btn-delete-solusi').on('click', function () {
      var id_solusi = $(this).data('id_solusi');
      $('.id_solusi').val(id_solusi); 
      $('.text_id_solusi').text(id_solusi); 
    });

    $('.btn-view-kerusakan').on('click', function () {
      var id_kerusakan = $(this).data('id_kerusakan');
      var kerusakan = $(this).data('kerusakan');
      var id_solusi = $(this).data('id_solusi');
      var solusi = $(this).data('solusi');
      $('.id_kerusakan').text(id_kerusakan);
      $('.kerusakan').text(kerusakan);
      $('.id_solusi').text(id_solusi);
      $('.solusi').html(solusi).text();
    });

    $('.btn-edit-kerusakan').on('click', function () {
      var id_kerusakan = $(this).data('id_kerusakan');
      var kerusakan = $(this).data('kerusakan');
      var id_solusi = $(this).data('id_solusi');
      $('.id_kerusakan').val(id_kerusakan);
      $('.kerusakan').val(kerusakan);
      $('.option_edit_solusi').val(id_solusi).trigger('change');
    });

    $('.btn-delete-kerusakan').on('click', function () {
      var id_kerusakan = $(this).data('id_kerusakan');
      var kerusakan = $(this).data('kerusakan');
      $('.id_kerusakan').val(id_kerusakan);
      $('.kerusakan').text(kerusakan);
    });

    //Initialize Select2 Elements
    $('.option_tambah_solusi').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.option_edit_solusi').select2({
      theme: 'bootstrap4'
    })

    $('.btn-edit-gejala-basiskasus').on('click', function () {
      var id_basiskasus = $(this).data('id_basiskasus');
      var kode_Kasus = $(this).data('kode_kasus');
      var id_kerusakan = $(this).data('id_kerusakan');
      var id_gejala = $(this).data('id_gejala');
      var bobot = $(this).data('bobot');
      $('.id_basiskasus').val(id_basiskasus);
      $('.kode_kasus').val(kode_Kasus);
      $('.id_kerusakan').val(id_kerusakan);
      $('.option_edit_gejala').val(id_gejala).trigger('change');
      $('.bobot').val(bobot);
    });

    $('.btn-delete-gejala-basiskasus').on('click', function () {
      var id_basiskasus = $(this).data('id_basiskasus');
      var gejala = $(this).data('gejala');
      $('.id_basiskasus').val(id_basiskasus);
      $('.gejala').text(gejala);
    });

    $('.btn-delete-basiskasus').on('click', function () {
      var kode_kasus = $(this).data('kode_kasus');
      var kerusakan = $(this).data('kerusakan');
      $('.kode_kasus').val(kode_kasus);
      $('.kerusakan').text(kerusakan);
    });

    $('.btn-tambah-gejala-basiskasus').on('click', function () {
      var kode_kasus = $(this).data('kode_kasus');
      var kerusakan = $(this).data('kerusakan');
      var id_kerusakan = $(this).data('id_kerusakan');
      $('.kode_kasus').val(kode_kasus);
      $('.kerusakan').val(kerusakan);
      $('.id_kerusakan').val(id_kerusakan);
    });

    $('.btn-edit-gejala-kasusbaru').on('click', function () {
      var id_kasus_baru = $(this).data('id_kasus_baru');
      var kode_kasus = $(this).data('kode_kasus');
      var gejala = $(this).data('gejala');
      var id_gejala = $(this).data('id_gejala');
      var bobot = $(this).data('bobot');
      $('.id_kasus_baru').val(id_kasus_baru);
      $('.kode_kasus').val(kode_kasus);
      $('.gejala').val(gejala);
      $('.id_gejala').val(id_gejala);
      $('.bobot').val(bobot);
    });

    $('.btn-delete-kasusbaru').on('click', function () {
      var kode_kasus = $(this).data('kode_kasus');
      $('.kasus_baru').text(kode_kasus);
      $('.kode_kasus').val(kode_kasus);
    });

    //Initialize Select2 Elements
    $('.option_gejala').select2( {
        theme: 'bootstrap4'
      }
    )

     //Initialize Select2 Elements
     $('.option_edit_gejala').select2( {
        theme: 'bootstrap4'
      }
    )

     //Initialize Select2 Elements
     $('.option_kerusakan').select2( {
        theme: 'bootstrap4'
      }
    )

     //Initialize Select2 Elements
     $('.option_edit_kerusakan').select2( {
        theme: 'bootstrap4'
      }
    )

    $('#summernote1').summernote();
    var table_perhitungan = document.getElementById('hasil-perhitungan');
    table_perhitungan.style.display = "none";
    $('.perhitugnan').on('click', function () {
      console.log('asdf');
      if (table_perhitungan.style.display == 'none') {
        table_perhitungan.style.display = 'block';
      } else {
        table_perhitungan.style.display = 'none';
      }
    });
  });
  
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#table_basisKasus').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  </script>
</body>

</html>
