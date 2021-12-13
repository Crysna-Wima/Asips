<!DOCTYPE html>
<html>
<head>
	<title>Edit Balita</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 2%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit Balita</h5>
		</div>
		<div class="card-body">
			@foreach($balita as $p)
			<form action="/balita/update" method="post">
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
					<label for="formGroupExampleInput" class="form-label">NIK Orang Tua</label>
					<input type="text" class="form-control" name="NIK" required="required" placeholder="NIK Orang Tua" value="{{ $p->NIK_ORANG_TUA }}" maxlength="16">
				</div>
				<div class="mb-3">
					<label for="formGroupExampleInput" class="form-label">Nama Orang Tua</label>
					<input type="text" class="form-control" name="Ortu" required="required" placeholder="Nama Orang Tua" value="{{ $p->NAMA_ORANG_TUA }}" maxlength="50">
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
					<a href="/balita" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
			</form>
			@endforeach 
		</div>
	</div>
</body>
</html>