<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Data Balita</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

    <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('/your-path-to-fontawesome/css/all.css')}}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header text-center" style="margin: 20px">
          <i class="fas fa-globe"></i> Laporan Balita (ASIPS)
          <small class="float-right text-xs">Date: {{ date('d-M-Y') }}</small>
        </h2>
        <p style="margin: 5px">Data Balita saat ini :</p> 
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NO</th>
            <th>ID Balita</th>
            <th>Nama Posyandu</th>
            <th>Nama Balita</th>
            <th>NIK</th>
            <th>Nama Ortu</th>
            <th>TGL Lahir Balita</th>
            <th>JK Balita</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            <?php $no=1 ?>
          @foreach ($balita as $item)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->ID_BALITA }}</td>
            <td>{{ $item->NAMA_POSYANDU }}</td>
            <td>{{ $item->NAMA_BALITA }}</td>
            <td>{{ $item->NIK_ORANG_TUA }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->TGL_LAHIR_BALITA }}</td>
            <td>{{ $item->JENIS_KELAMIN_BALITA }}</td>
            <td>{{ $item->STATUS }}</td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>