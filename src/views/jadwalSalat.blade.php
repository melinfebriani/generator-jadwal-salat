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
    <form action="{{route('jadwalSalat')}}" method="post">
        @csrf
        <input type="text" name="by" placeholder="masukkan berdasarkan kota/provinsi" require>
        <input type="text" name="lokasi" placeholder="masukkan lokasi" require>
        <input type="text" name="tanggal" placeholder="masukkan tanggal dengan format dd-mm-yyyy" require>
        <input type="submit" value="Tampilkan Jadwal">
    </form>
    <br>

    <div class="card ms-2">
    @foreach($data as $data)
    <ul class="list-group">
        <x-header :data="$data"/>
        <x-jadwal :data="$data">subuh</x-jadwal>
        <x-jadwal :data="$data">dzuhur</x-jadwal>
        <x-jadwal :data="$data">ashar</x-jadwal>
        <x-jadwal :data="$data">maghrib</x-jadwal>
        <x-jadwal :data="$data">isya</x-jadwal>
    </ul>
    @endforeach
    </div>
   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>