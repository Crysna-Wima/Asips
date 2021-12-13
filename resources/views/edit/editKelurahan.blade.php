<!DOCTYPE html>
<html>
<head>
	<title>Edit Kelurahan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 10%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Kelurahan</h5>
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
</body>
</html>