@extends('layout.tables')
@section('tables')
<?php
use App\Http\Controllers\kecamatanController;
use App\Http\Controllers\kelurahanController;
use App\Http\Controllers\posyanduController;
use App\Http\Controllers\balitaController;
?>
<h1 class="text-center" style="color: rgb(52, 8, 214); margin-top: 20px; margin-bottom: 20px">HI, Welcome Back 
    <strong style="color: rgb(4, 4, 133)">{{ Auth::user()->name }}</strong></h1>
<h5>Data saat ini :</h5>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Kecamatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo KecamatanController::count();?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Kelurahan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo KelurahanController::count();?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Posyandu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo PosyanduController::count();?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Balita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo BalitaController::count();?></div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection