 @extends('layout.tables')
@section('tables')
    <h1 class="h3 mb-2 text-gray-800">Restore Posyandu</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/posyandu">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID POSYANDU</th>
                            <th>KELURAHAN</th>
                            <th>NAMA POSYANDU</th>
                            <th>ALAMAT</th>
                            <th>DELETED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restoreposyandu as $item)
                        <tr>
                            <td>{{ $item->ID_POSYANDU }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->NAMA_POSYANDU }}</td>
                            <td>{{ $item->ALAMAT_POSYANDU }}</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/posyandu/restore/{{ $item->ID_POSYANDU }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection
