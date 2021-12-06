<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="h3 mb-2 text-gray-800">Restore Tables Kecamatan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a type="button" class="btn btn-primary" href="/kecamatan">Kembali</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID_Kecamatan</th>
                            <th>Kecamatan</th>
                            <th>Deleted_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restorekecamatan as $item)
                        <tr>
                            <td>{{ $item->ID_KECAMATAN }}</td>
                            <td>{{ $item->KECAMATAN }}</td>
                            <td>{{ $item->DELETED_AT }}</td>
                            <td><a type="button" class="btn btn-success" href="/kecamatan/restore/{{ $item->ID_KECAMATAN }}" onclick="return confirm('Apakah anda ingin memulihkannya?')">Restore</a></td>                                         
                        </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
