@extends('layout.tablesuser')
@section('tables')
<h1 class="h3 mb-2 text-gray-800">Tables Balita</h1>
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

    <!--Tambah Balita modal-->
    <div class="modal fade" id="tambahBalita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Balita</h5>
            </div>
            <div class="modal-body">
                <form action="/balita/store" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">ID Posyandu</label>
                        <input type="number" class="form-control" name="posyandu" required="required" placeholder="1" max="{{ $jumlah }}" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Balita</label>
                        <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Balita" maxlength="50" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">NIK Orang Tua</label>
                        <input class="form-control" name="NIK" maxlength="16" required="required" maxlength="16" min="16">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Orang Tua</label>
                        <input type="text" class="form-control" name="Ortu" required="required" placeholder="Ortu" maxlength="50" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label"> Tanggal lahir Balita</label>
                        <input type="date" class="form-control" name="lahir" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Jenis Kelamin Balita</label><br>
                        <input type="radio" name="jk" required="required" value="L">  Laki-Laki <br><input type="radio" name="jk" required="required" value="P">  Perempuan
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Status</label><br>
                        <input type="radio" name="status" required="required" value="1">  Sehat <br><input type="radio" name="status" required="required" value="0">  Stunting
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
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBalita">Tambah</button>
                            <a type="button" class="btn btn-primary" href="/balita/restore">Restore</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_Balita</th>
                                            <th>ID_Posyandu</th>
                                            <th>Nama_Balita</th>
                                            <th>NIK_Orang_Tua</th>
                                            <th>Nama_Orang_Tua</th>
                                            <th>Tgl_Lahir_Balita</th>
                                            <th>Jenis_Kelamin_Balita</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                            <th>Update_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($balita as $item)
                                        <tr>
                                            <td>{{ $item->ID_BALITA }}</td>
                                            <td>{{ $item->ID_POSYANDU }}</td>
                                            <td>{{ $item->NAMA_BALITA }}</td>
                                            <td>{{ $item->NIK_ORANG_TUA }}</td>
                                            <td>{{ $item->NAMA_ORANG_TUA }}</td>
                                            <td>{{ $item->TGL_LAHIR_BALITA }}</td>
                                            <td>
                                                <?php 
                                                if ($item->JENIS_KELAMIN_BALITA=="L"){echo "Laki-Laki";}
                                                if ($item->JENIS_KELAMIN_BALITA=="P"){echo "Perempuan";}
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if ($item->STATUS==1){echo "SEHAT";}
                                                if ($item->STATUS==0){echo "STUNTING";}
                                                ?>
                                            </td>
                                            <td>{{ $item->CREATED_AT }}</td>
                                            <td>{{ $item->UPDATED_AT }}</td>
                                            <td>
                                                <a href="/balitauser/edit/{{ $item->ID_BALITA }}"> <img src="assets/img/edit.svg" alt="edit" style="max-width: 27%;"></a> |
                                                <a href="/balitauser/hapus/{{ $item->ID_BALITA }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <img src="assets/img/delete.svg" alt="hapus" style="max-width: 25%;"></a>
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