@extends('layout.tableparent')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h1>History Posyandu</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
<<<<<<< HEAD
                                            <th>BALITA</th>
                                            <th>NAMA POSYANDU</th>
                                            <th>TGL POSYANDU</th>
                                            <th>BERAT BADAN BALITA</th>
                                            <th>TINGGI BADAN</th>
=======
                                            <th>ID_BALITA</th>
                                            <th>TGL_PEMERIKSAAN</th>
                                            <th>BB_BALITA</th>
                                            <th>TB_BALITA</th>
>>>>>>> 82be296843cde8dff828da80ad21b91ddb598b27
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                        <tr>
                                            <td>{{ $item->NAMA_BALITA }}</td>
                                            <td>{{$item->NAMA_POSYANDU}}</td>
                                            <td>{{ $item->TGL_POSYANDU }}</td>
<<<<<<< HEAD
                                            <td>{{ $item->BERAT_BADAN_BALITA }} gram</td>
                                            <td>{{ $item->TINGGI_BADAN }} cm</td>
=======
                                            <td>{{ $item->BERAT_BADAN_BALITA }} <?php echo "ONS" ?></td>
                                            <td>{{ $item->TINGGI_BADAN }} <?php echo "CM" ?></td>
>>>>>>> 82be296843cde8dff828da80ad21b91ddb598b27
                                        </tr>
                                        @endforeach                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection
