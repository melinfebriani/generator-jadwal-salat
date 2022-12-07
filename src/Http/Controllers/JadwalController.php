<?php

namespace Kelompok5\GeneratorJadwalSholat\Http\Controllers;

use App\Http\Controllers\Controller;
use Kelompok5\GeneratorJadwalSholat\Core;
use Kelompok5\GeneratorJadwalSholat\JadwalBuilder;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() {
        return view('jadwalSalat::jadwalSalat');
    }

    public function send(Request $request) {
        $api = (new JadwalBuilder())
        ->setBy($request->by) //kota/provinsi
        ->setLokasi($request->lokasi)
        ->setTanggal($request->tanggal) //d-m-y
        ->build();
        $data = $api->getData();
        return view('jadwalSalat::jadwalSalat', ["data"=>$data]);
    }

    public function jadwalSalat() {
        $api = (new JadwalBuilder())
        ->build();
        $data = $api->getData();
        return view('jadwalSalat::jadwalSalat', ["data"=>$data]);
    }
}
