@extends('layout.tables')
@section('tables')
<h1 class="h3 mb-2 text-gray-800">Tables Posyandu</h1>
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

<!--Tambah Posyandu modal-->
<div class="modal fade" id="tambahPosyandu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Posyandu</h5>
        </div>
        <div class="modal-body">
            <form action="/posyandu/store" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Kelurahan</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="kelurahan">
                        @foreach ($kelurahan as $item)
                        <option value="{{ $item->ID_KELURAHAN }}">{{ $item->KELURAHAN }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Posyandu</label>
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Posyandu" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Alamat Posyandu</label>
                    <textarea class="form-control" name="alamat" required="required" placeholder="Alamat Posyandu" maxlength="300"></textarea>
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
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahPosyandu">Tambah</button>
                            <a type="button" class="btn btn-primary" href="/posyandu/restore">Restore</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_Posyandu</th>
                                            <th>Kelurahan</th>
                                            <th>Nama_Posyandu</th>
                                            <th>Alamat</th>
                                            <th>Created_at</th>
                                            <th>Update_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posyandu as $item)
                                        <tr>
                                            <td>{{ $item->ID_POSYANDU }}</td>
                                            <td>{{ $item->KELURAHAN }}</td>
                                            <td>{{ $item->NAMA_POSYANDU }}</td>
                                            <td>{{ $item->ALAMAT_POSYANDU }}</td>
                                            <td>{{ $item->CREATED_AT }}</td>
                                            <td>{{ $item->UPDATED_AT }}</td>
                                            <td>
                                                <a href="/posyandu/edit/{{ $item->ID_POSYANDU }}"> <img src="assets/img/edit.svg" alt="edit" style="max-width: 27%;"></a> |
                                                <a href="/posyandu/hapus/{{ $item->ID_POSYANDU }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <img src="assets/img/delete.svg" alt="hapus" style="max-width: 25%;"></a>
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