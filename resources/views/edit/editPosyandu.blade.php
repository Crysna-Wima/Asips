<!DOCTYPE html>
<html>
<head>
	<title>Edit Posyandu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 2%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Posyandu</h5>
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
</body>
</html>