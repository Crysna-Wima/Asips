<!DOCTYPE html>
<html>
<head>
	<title>Edit History Posyandu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: rgb(116, 205, 243)">
	<div class="card text-right" style="width:400px; align-items: center; margin-left: 32%; margin-top: 10%; padding: 20px">
		<div>
			<h5 style="color: rgb(13, 156, 218)">Edit History Posyandu</h5>
		</div>
		<div class="card-body">
		@foreach($history as $p)
		<form action="/historyPosyandu/update" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $p->ID_HISTORY_POSYANDU }}"> <br/>
			<div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">ID_BALITA</label>
                <input type="number" class="form-control" name="id_balita" required="required" placeholder="ID Balita" max="$jumlah" min="1" required="required" value="{{ $p->ID_BALITA}}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">ID_USER</label>
                <input type="number" class="form-control" name="id_user" required="required" placeholder="ID User" max="$jumlah1" min="1" required="required" value="{{ $p->ID_USER }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">TGL_POSYANDU</label>
                <input type="datetime-local" class="form-control" name="tgl_posyandu" required="required" value="{{ $p->TGL_POSYANDU }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">BERAT_BADAN_BALITA</label>
                <input type="text" class="form-control" name="berat_badan" required="required" placeholder="Berat badan" maxlength="20" minlength="1" value="{{ $p->BERAT_BADAN_BALITA }}">
            </div> 
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">TINGGI_BADAN</label>
                <input type="text" class="form-control" name="tinggi_badan" required="required" placeholder="Nama Kecamatan" maxlength="20" minlength="1" value="{{ $p->TINGGI_BADAN }}">
            </div>             
            </div>
				<div class="modal-footer">
					<a href="/historyPosyandu" class="btn btn-secondary">Kembali</a>
					<input type="submit" class="btn btn-primary" value="Simpan Data">
				</div>
		</form>
		@endforeach 
		</div>
	</div>
</body>
</html>
