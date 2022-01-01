@extends('layout.tablesuser')
@section('tablesuser')
	<div class="card shadow col-6 mx-auto" style="margin-bottom: 10%; margin-top: 5%">
		<div class="card-header py-3 d-flex justify-content-between">
			<h4>Edit Balita</h4>
		</div>
		<div class="card-body">
			@foreach($balita as $p)
			<form action="/balitauser/update" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $p->ID_BALITA }}"> <br/>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Posyandu</label>
					<select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="posyandu">
						@foreach ($posyandu as $item)
						<option value="{{ $item->ID_POSYANDU }}">{{ $item->NAMA_POSYANDU }}</option>
						@endforeach
					  </select>
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Balita</label>
					<input type="text" class="form-control" name="nama" required="required" placeholder="Nama Balita" value="{{ $p->NAMA_BALITA }}" maxlength="50">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Orang Tua</label>
					<select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="NIK">
						@foreach ($users as $item)
						<option value="{{ $item->NIK }}">{{ $item->name }}</option>
						@endforeach
						</select>
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Tanggal Lahir Balita</label>
					<input type="date" name="lahir" class="form-control" required="required" value="{{ $p->TGL_LAHIR_BALITA }}">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Jenis Kelamin Balita</label> <br>
					<input type="radio" name="jk" required="required" value="L" value="{{ $p->TGL_LAHIR_BALITA }}">  Laki-laki <br>
					<input type="radio" name="jk" required="required" value="P" value="{{ $p->TGL_LAHIR_BALITA }}">  Perempuan <br>
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Status</label><br>
					<input type="radio" name="status" required="required" value="1">  Sehat <br><input type="radio" name="status" required="required" value="0">  Stunting
				</div>
				<div class="modal-footer">
					<a href="/balitauser" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach
		</div>
	</div>
@endsection