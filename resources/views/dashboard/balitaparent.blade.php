@extends('layout.tableparent')
@section('tables')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID BALITA</th>
                                            <th>POSYANDU</th>
                                            <th>NAMA BALITA</th>
                                            <th>TANGGAL LAHIR BALITA</th>
                                            <th>JENIS KELAMIN BALITA</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($balita as $item)
                                        <tr>
                                            <td>{{ $item->ID_BALITA }}</td>
                                            <td>{{ $item->NAMA_POSYANDU }}</td>
                                            <td>{{ $item->NAMA_BALITA }}</td>
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