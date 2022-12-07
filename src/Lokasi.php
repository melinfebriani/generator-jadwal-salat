<?php
namespace Kelompok5\GeneratorJadwalSholat;

use Exception;

class Lokasi implements DataModel{
    private $by;
    private $req;
    private $res;
    private $url;
    private $provinsi;

    public function __construct($by, $lokasi){
        $this->by = $by;
        $this->req = $lokasi;
        $this->res = array();
        $this->provinsi = array(
            'aceh' => ["Banda Aceh","Langsa","Sabang","Lhokseumawe","Subulussalam"],
            'sumatera utara' => ["Binjai","Gunungsitoli","Medan","Padangsidimpuan","Pematangsiantar","Sibolga","Tanjungbalai","Tebing Tinggi"], 
            'sumatera barat' => ["Padang","Bukittinggi","Pariaman","Padang Panjang","Payakumbuh","Sawahlunto","Solok"],
            'sumatera selatan' => ["Lubuklinggau","Palembang","Prabumulih","Pagar Alam"],
            'riau' => ["Pekanbaru","Dumai","Bengkalis"],
            'jambi' => ["Jambi","Sungai Penuh"],
            'bangka belitung' => ["Pangkalpinang"],
            'gorontalo' => ["Gorontalo"],
            'daerah istimewa yogyakarta' => ["Yogyakarta"],
            'bali' => ["Denpasar"],
            'banten' => ["Cilegon","Serang","Tangerang Selatan","Tangerang"],
            'bengkulu' => ["Bengkulu"],
            'jakarta' => ["Jakarta Barat","Jakarta Timur","Jakarta Selatan","Jakarta Pusat"],
            'jawa timur' => ["Malang","Surabaya","Gresik","Batu","Blitar","Kediri","Madiun","Mojokerto","Pasuruan","Probolinggo"],
            'jawa barat' => ["Bandung","Bogor","Tasikmalaya","Bekasi","Cimahi","Cirebon","Depok","Sukabumi","Banjar"],
            'jawa tengah' => ["Solo","Semarang","Kudus","Magelang","Pekalongan","Salatiga","Surakarta","Tegal"],
            'kalimantan barat' => ["Pontianak","Singkawang"],
            'kalimantan selatan' => ["Banjarbaru","Banjarmasin"],
            'kalimantan tengah' => ["Palangkaraya"],
            'kalimantan uimur' => ["Balikpapan","Bontang","Samarinda","Nusantara","Tarakan"],
            'kalimantan utara' => ["Tarakan"],
            'kepulauan riau' => ["Batam","Tanjungpinang"],
            'lampung' => ["Bandar Lampung","Metro"],
            'maluku utara' => ["Tidore Kepulauan"],
            'maluku' => ["Ambon","Tual"],
            'nusa tenggara barat' => ["Bima","Mataram"],
            'nusa tenggara timur' => ["Kupang"],
            'papua barat' => ["Sorong"],
            'papua' => ["Jayapura"],
            'sulawesi selatan' => ["Makassar","Palopo","Parepare"],
            'sulawesi tengah' => ["Palu"],
            'sulawesi tenggara' => ["Kendari","Baubau"],
            'sulawesi utara' => ["Blitung","Kotamobagu","Manado","Tomohon"] //update
        );
    }

    // private function setRequest($r){
    //     $this->req = $r;
    // }

    private function setResponse($r){
        array_push($this->res, $r);
    }

    private function getByKota($r){
        try{
            $this->url = 'https://api.myquran.com/v1/sholat/kota/cari/'.$r;
            $data = json_decode(file_get_contents($this->url));
            
            if($data->status){
                $this->setResponse($data->data[0]->id);
            }else{
                throw new Exception ("not found");
            }
        }catch (Exception $e){
            $this->res = $e->getMessage();
        }
    }
    private function getByProv($r){
        $kota = $this->provinsi[$r];
        for ($i = 0; $i < count($kota); $i++) {
            $this->getByKota($kota[$i]);
        }   
    }

    public function getResponse(){
        if(strtolower($this->by) == "kota"){
            $this->getByKota($this->req);
        }else{
            $this->getByProv(strtolower($this->req));

        }
        return $this->res;
    }
}
