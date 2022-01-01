@extends('layout.tablesuser')
@section('tablesuser')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 10%; margin-top: 5%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit History Posyandu</h4>
		</div>
		<div class="card-body">
			@foreach($history as $p)
		<form action="/historyPosyanduuser/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $p->ID_HISTORY_POSYANDU }}"> <br/>
			<div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Balita</label>
                <select class="form-select form-select-lg mb-3 form-control" required="required" aria-label=".form-select-lg example" name="id_balita">
                    @foreach ($balita as $item)
                    <option value="{{ $item->ID_BALITA }}">{{ $item->NAMA_BALITA }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tgl Posyandu</label>
                <input type="datetime-local" class="form-control" name="tgl_posyandu" required="required" value="{{ $p->TGL_POSYANDU }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Berat Badan Balita (Satuan gram)</label>
                <input type="number" class="form-control" name="berat_badan" required="required" placeholder="Berat badan" maxlength="20" minlength="1" value="{{ $p->BERAT_BADAN_BALITA }}">
            </div> 
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tinggi Badan Balita (Satuan centimeter)</label>
                <input type="number" class="form-control" name="tinggi_badan" required="required" placeholder="Tinggi Badan" maxlength="20" minlength="1" value="{{ $p->TINGGI_BADAN }}">
            </div>             
            </div>
				<div class="modal-footer">
					<a href="/historyPosyanduuser" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
		</form>
		@endforeach
		</div>
	</div>
@endsection
