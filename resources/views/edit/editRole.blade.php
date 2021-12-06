<!DOCTYPE html>
<html>
<head>
	<title>Edit Role</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 2%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Role</h5>
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
</body>
</html>