@extends('layout.tables')
@section('tables')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 15%; margin-top: 10%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Role</h4>
		</div>
		<div class="card-body">
			@foreach($role as $p)
			<form action="/role/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->ID_ROLE }}"> <br/>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Role</label>
					<input type="text" class="form-control" name="role" required="required" placeholder="Nama Role" value="{{ $p->ROLE }}" maxlength="20">
				</div>
				<div class="modal-footer">
					<a href="/role" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach
		</div>
	</div>
@endsection