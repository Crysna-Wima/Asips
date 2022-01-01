@extends('layout.tables')
@section('tables')
    <h1 class="h3 mb-2 text-gray-800">Restore Kecamatan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/kecamatan">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID KECAMATAN</th>
                            <th>KECAMATAN</th>
                            <th>DELETED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restorekecamatan as $item)
                        <tr>
                            <td>{{ $item->ID_KECAMATAN }}</td>
                            <td>{{ $item->KECAMATAN }}</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/kecamatan/restore/{{ $item->ID_KECAMATAN }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection
