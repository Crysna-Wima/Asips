@extends('layout.tablesuser')
@section('tablesuser')
    <h1 class="h3 mb-2 text-gray-800">Restore History Posyandu</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/historyPosyanduuser">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID HISTORY POSYANDU</th>
                            <th>BALITA</th>
                            <th>NAMA ORANG TUA</th>
                            <th>TGL POSYANDU</th>
                            <th>BERAT BADAN BALITA</th>
                            <th>TINGGI BADAN</th>
                            <th>DELETED_AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restorehistory as $item)
                        <tr>
                            <td>{{ $item->ID_HISTORY_POSYANDU }}</td>
                            <td>{{ $item->balita }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->TGL_POSYANDU }}</td>
                            <td>{{ $item->BERAT_BADAN_BALITA }} gram</td>
                            <td>{{ $item->TINGGI_BADAN }} cm</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/historyPosyanduuser/restore/{{ $item->ID_HISTORY_POSYANDU }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection