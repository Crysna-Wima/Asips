@extends('layout.tables')
@section('tables')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 10%; margin-top: 5%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Admin</h4>
		</div>
		<div class="card-body">
			@foreach($admin as $p)
			<form action="/admins/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
				<div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="name" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="3" value="{{ $p->name }}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="3" value="{{ $p->username }}">
                </div>         
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="3" value="{{ $p->email }}">
                </div>    
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="3" value="password">
                </div>
                <div class="modal-footer">
					<a href="/admins" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach 
		</div>
	</div>
@endsection