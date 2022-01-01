@extends('layout.tables')
@section('tables')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 15%; margin-top: 10%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Kelurahan</h4>
		</div>
		<div class="card-body">
			@foreach($kelurahan as $p)
			<form action="/kelurahan/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->ID_KELURAHAN }}"> <br/>
				<div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Kecamatan</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="id_kecamatan">
                        @foreach ($kecamatan as $item)
                        <option value="{{ $item->ID_KECAMATAN }}">{{ $item->KECAMATAN }}</option>
                        @endforeach
                      </select>
                </div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Kelurahan</label>
					<input type="text" name="kelurahan" class="form-control" required="required" placeholder="Kelurahan" value="{{ $p->KELURAHAN }}" maxlength="20" minlength="3">
				</div>
				<div class="modal-footer">
					<a href="/kelurahan" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach 
		</div>
	</div>
@endsection
