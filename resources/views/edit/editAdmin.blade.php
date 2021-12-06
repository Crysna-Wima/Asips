<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 2%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Admin</h5>
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
					<a href="/kecamatan" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach 
		</div>
	</div>
</body>
</html>