@extends('layout.tables')
@section('tables')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 15%; margin-top: 10%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Kecamatan</h4>
		</div>
		<div class="card-body">
			@foreach($kecamatan as $p)
			<form action="/kecamatan/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->ID_KECAMATAN }}"> <br/>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Kecamatan</label>
					<input type="text" class="form-control" name="kecamatan" required="required" placeholder="Nama Kecamatan" value="{{ $p->KECAMATAN }}" maxlength="20" minlength="3">
				</div>
					<div class="modal-footer">
						<a href="/kecamatan" class="btn btn-secondary">Kembali</a>
						<input type="submit" class="btn btn-primary" value="Simpan Data">
					</div>
			</form>
			@endforeach
		</div>
	</div>
@endsection
