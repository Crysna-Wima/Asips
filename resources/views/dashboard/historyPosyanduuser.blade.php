@extends('layout.tablesuser')
@section('tables')
<h1 class="h3 mb-2 text-gray-800">Tables History Posyandu</h1>
@if (session()->has('tambah'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('tambah') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('hapus'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('hapus') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('back'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('back') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!--Tambah Kecamatan modal-->
<div class="modal fade" id="tambahKecamatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah History Posyandu</h5>
        </div>
        <div class="modal-body">
            <form action="/historyPosyanduuser/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">ID_BALITA</label>
                    <input type="number" class="form-control" name="id_balita" required="required" placeholder="ID Balita" max="$jumlah" min="1" required="required">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">ID_USER</label>
                    <input type="number" class="form-control" name="id_user" required="required" placeholder="ID User" max="$jumlah1" min="1" required="required">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">TGL_POSYANDU</label>
                    <input type="datetime-local" class="form-control" name="tgl_posyandu" required="required">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">BERAT_BADAN_BALITA</label>
                    <input type="text" class="form-control" name="berat_badan" required="required" placeholder="Berat badan" maxlength="20" minlength="1">
                </div> 
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">TINGGI_BADAN</label>
                    <input type="text" class="form-control" name="tinggi_badan" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="1">
                </div>             
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </form>
        </div>
    </div>
</div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahKecamatan">Tambah</button>
                            <a type="button" class="btn btn-primary" href="/historyPosyanduuser/restore">Restore</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_HISTORY_POSYANDU</th>
                                            <th>ID_BALITA</th>
                                            <th>ID_USER</th>
                                            <th>TGL_POSYANDU</th>
                                            <th>BERAT_BADAN_BALITA</th>
                                            <th>TINGGI_BADAN</th>
                                            <th>CREATED_AT</th>
                                            <th>UPDATED_AT</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                        <tr>
                                            <td>{{ $item->ID_HISTORY_POSYANDU }}</td>
                                            <td>{{ $item->ID_BALITA }}</td>
                                            <td>{{ $item->ID_USER }}</td>
                                            <td>{{ $item->TGL_POSYANDU }}</td>
                                            <td>{{ $item->BERAT_BADAN_BALITA }}</td>
                                            <td>{{ $item->TINGGI_BADAN }}</td>
                                            <td>{{ $item->CREATED_AT }}</td>
                                            <td>{{ $item->UPDATED_AT }}</td>
                                            <td>
                                                <a href="/historyPosyanduuser/edit/{{ $item->ID_HISTORY_POSYANDU }}"> <img src="assets/img/edit.svg" alt="edit" style="max-width: 27%;"></a> |
                                                <a href="/historyPosyanduuser/hapus/{{ $item->ID_HISTORY_POSYANDU }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <img src="assets/img/delete.svg" alt="hapus" style="max-width: 25%;"></a>
                                            </td>                                         
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