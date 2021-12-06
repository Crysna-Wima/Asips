<!DOCTYPE html>
<html>
<head>
	<title>Edit Kecamatan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 10%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Kecamatan</h5>
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
</body>
</html>
