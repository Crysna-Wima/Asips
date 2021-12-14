@extends('layout.tableparent')
@section('tables')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID_BALITA</th>
                                            <th>TGL_PEMERIKSAAN</th>
                                            <th>BB_BALITA</th>
                                            <th>TB_BALITA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $item)
                                        <tr>
                                            <td>{{ $item->ID_BALITA }}</td>
                                            <td>{{ $item->TGL_POSYANDU }}</td>
                                            <td>{{ $item->BERAT_BADAN_BALITA }} <?php echo "ONS" ?></td>
                                            <td>{{ $item->TINGGI_BADAN }} <?php echo "CM" ?></td>
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
