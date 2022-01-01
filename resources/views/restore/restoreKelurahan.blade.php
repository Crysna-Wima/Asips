@extends('layout.tables')
@section('tables')
    <h1 class="h3 mb-2 text-gray-800">Restore Kelurahan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/kelurahan">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID KELURAHAN</th>
                            <th>KECAMATAN</th>
                            <th>KELURAHAN</th>
                            <th>DELETED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restorekelurahan as $item)
                        <tr>
                            <td>{{ $item->ID_KELURAHAN }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->KELURAHAN }}</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/kelurahan/restore/{{ $item->ID_KELURAHAN }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection
