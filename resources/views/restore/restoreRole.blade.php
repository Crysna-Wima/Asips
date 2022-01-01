@extends('layout.tables')
@section('tables')
    <h1 class="h3 mb-2 text-gray-800">Restore Role</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/role">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID ROLE</th>
                            <th>ROLE</th>
                            <th>DELETED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restorerole as $item)
                        <tr>
                            <td>{{ $item->ID_ROLE }}</td>
                            <td>{{ $item->ROLE }}</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/role/restore/{{ $item->ID_ROLE }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection