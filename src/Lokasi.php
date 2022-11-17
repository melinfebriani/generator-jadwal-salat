<?php
namespace Kelompok5\GeneratorJadwalSholat;

use Exception;

class Lokasi implements DataModel{
    private $by;
    private $req;
    private $res;
    private $url;
    private $provinsi;

    public function __construct($by){
        $this->by = $by;
        $this->res = array();
        $this->provinsi = array(
            'Aceh' => ["Banda Aceh","Langsa","Sabang"],
            'Sumatera Utara' => ["Binjai","Gunungsitoli","Medan"], 
            'Sumatera Barat' => ["Padang","Bukittinggi","Pariaman"],
            'Riau' => ["Pekanbaru","Dumai","Bengkalis"]
        );
    }

    public function setRequest($r){
        $this->req = $r;
    }

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
            $this->getByProv($this->req);

        }
        return $this->res;
    }
}
