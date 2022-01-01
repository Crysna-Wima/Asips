@extends('layout.tablesuser')
@section('tablesuser')
    <h1 class="h3 mb-2 text-gray-800">Restore Balita</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <a type="button" class="btn btn-primary" href="/balitauser">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID BALITA</th>
                            <th>POSYANDU</th>
                            <th>NAMA BALITA</th>
                            <th>NAMA ORANG TUA</th>
                            <th>TGL LAHIR</th>
                            <th>JENIS KELAMIN</th>
                            <th>STATUS</th>
                            <th>DELETED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($restorebalita as $item)
                        <tr>
                            <td>{{ $item->ID_BALITA }}</td>
                            <td>{{ $item->posyandu }}</td>
                            <td>{{ $item->NAMA_BALITA }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->TGL_LAHIR_BALITA }}</td>
                            <td>
                                <?php 
                                if ($item->JENIS_KELAMIN_BALITA=="L"){echo "LAKI-LAKI";}
                                if ($item->JENIS_KELAMIN_BALITA=="P"){echo "PEREMPUAN";}
                                ?>
                            </td>
                            <td>
                                <?php 
                                if ($item->STATUS==1){echo "SEHAT";}
                                if ($item->STATUS==0){echo "STUNTING";}
                                ?>
                            </td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/balitauser/restore/{{ $item->ID_BALITA }}" style="color: white" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
@endsection