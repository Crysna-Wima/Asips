@extends('layout.tablesuser')
@section('tables')
<h1 class="h3 mb-2 text-gray-800">Tables Balita</h1>

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