@extends('layout.tables')
@section('tables')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 10%; margin-top: 5%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Posyandu</h4>
		</div>
		<div class="card-body">
			@foreach($posyandu as $p)
			<form action="/posyandu/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->ID_POSYANDU }}"> <br/>
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
					<input type="text" name="nama" class="form-control" required="required" placeholder="Alamat Posyandu" value="{{ $p->NAMA_POSYANDU }}" maxlength="50">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Alamat Posyandu</label>
					<textarea name="alamat" class="form-control" required="required" value="{{ $p->ALAMAT_POSYANDU }}" maxlength="300"></textarea>
				</div>
				<div class="modal-footer">
					<a href="/posyandu" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach  
		</div>
	</div>
@endsection