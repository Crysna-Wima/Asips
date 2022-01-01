@extends('layout.tableparent')
@section('tables')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>BALITA</th>
                                            <th>NAMA POSYANDU</th>
                                            <th>TGL POSYANDU</th>
                                            <th>BERAT_BADAN_BALITA</th>
                                            <th>TINGGI_BADAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                        <tr>
                                            <td>{{ $item->NAMA_BALITA }}</td>
                                            <td>{{$item->NAMA_POSYANDU}}</td>
                                            <td>{{ $item->TGL_POSYANDU }}</td>
                                            <td>{{ $item->BERAT_BADAN_BALITA }}</td>
                                            <td>{{ $item->TINGGI_BADAN }}</td>
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
