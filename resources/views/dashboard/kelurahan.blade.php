@extends('layout.tables')
@section('tables')
<h1 class="h3 mb-2 text-gray-800">Tables Kelurahan</h1>
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

<!--Tambah Kelurahan modal-->
<div class="modal fade" id="tambahKelurahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kelurahan</h5>
        </div>
        <div class="modal-body">
            <form action="/kelurahan/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">ID Kecamatan</label>
                    <input type="number" class="form-control" name="id_kecamatan" required="required" placeholder="1" max="{{ $jumlah }}" min="1">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Kelurahan</label>
                    <input type="text" class="form-control" name="kelurahan" required="required" placeholder="Nama Kelurahan" maxlength="20" minlength="3">
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
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahKelurahan">Tambah</button>
                            <a type="button" class="btn btn-primary" href="/kelurahan/restore">Restore</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_Kelurahan</th>
                                            <th>ID_kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Created_at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelurahan as $item)
                                        <tr>
                                            <td>{{ $item->ID_KELURAHAN }}</td>
                                            <td>{{ $item->ID_KECAMATAN }}</td>
                                            <td>{{ $item->KELURAHAN }}</td>
                                            <td>{{ $item->CREATED_AT }}</td>
                                            <td>{{ $item->UPDATED_AT }}</td>
                                            <td>
                                                <a href="/kelurahan/edit/{{ $item->ID_KELURAHAN }}"> <img src="assets/img/edit.svg" alt="edit" style="max-width: 27%;"></a> |
                                                <a href="/kelurahan/hapus/{{ $item->ID_KELURAHAN }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <img src="assets/img/delete.svg" alt="hapus" style="max-width: 25%;"></a>
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