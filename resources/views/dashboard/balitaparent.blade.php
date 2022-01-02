@extends('layout.tableparent')
@section('content')
<div class="container">    
    @foreach ($balita as $item)
    <div class="card">
        <div class="card-header">
            <h1>Data Balita</h1>
        </div>
        <div class="card-body">
        <div class="row mx-auto">
            <div class="col-5" style="padding-left: 15%">
                <img class="rounded-circle mx-auto" style="max-width: 70%"
                src="{{url('assets/img/undraw_profile.svg')}}">
            </div>
            <div class="col-4">
                <p>Nama Balita&emsp;&ensp;: {{ $item->NAMA_BALITA }}</p>
                <p>Posyandu&emsp;&emsp;&ensp;: {{ $item->NAMA_POSYANDU }}</p>
                <p>Tanggal Lahir&emsp;: {{ $item->TGL_LAHIR_BALITA }}</p>
                <p>Jenis Kelamin&emsp;: <?php 
                    if ($item->JENIS_KELAMIN_BALITA=="L"){echo "LAKI-LAKI";}
                    if ($item->JENIS_KELAMIN_BALITA=="P"){echo "PEREMPUAN";}
                    ?></p>
                <p>Status&emsp;&emsp;&emsp;&emsp;: <?php 
                    if ($item->STATUS==1){echo "SEHAT";}
                    if ($item->STATUS==0){echo "STUNTING";}
                    ?></p>
            </div>
        </div>
    </div>
</div>
@endforeach                                           
</div>
@endsection