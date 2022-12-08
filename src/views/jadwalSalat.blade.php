<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <title>Jadwal Salat</title>
</head>
<body>
    <form action="{{route('jadwalSalat')}}" method="post" class="ms-5 me-5">
    <div class="mb-3">
        <label class="form-label">Berdasarkan Kota/Provinsi</label>
        <input type="text" class="form-control" name="by" placeholder="Masukkan berdasarkan kota/provinsi" require>
    </div>
    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" placeholder="Masukkan lokasi" require>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="text" class="form-control" name="tanggal" placeholder="Masukkan tanggal dengan format dd-mm-yyyy" require>
    </div>
    <button type="submit" class="btn btn-primary">Tampilkan Jadwal</button>
    </form>
    <br>
    <div class="ms-5 me-5">
    @foreach($data as $data)
        <ul class="list-group">
        <x-jadwalSalat::header :data="$data"/>
            <table class="table">
            <tbody>
                <x-jadwalSalat::jadwal :data="$data">subuh</x-jadwal>
                <x-jadwalSalat::jadwal :data="$data">dzuhur</x-jadwal>
                <x-jadwalSalat::jadwal :data="$data">ashar</x-jadwal>
                <x-jadwalSalat::jadwal :data="$data">maghrib</x-jadwal>
                <x-jadwalSalat::jadwal :data="$data">isya</x-jadwal>
            </tbody>
            </table>
        </ul>
        @endforeach 
    </div>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>