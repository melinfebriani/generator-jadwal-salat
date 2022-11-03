<?php
namespace Kelompok5\GeneratorJadwalSholat;

use Exception;


class Core{
    private $baseurl;
    private $by;
    private $lokasi;
    private $tanggal;
    private $jadwal;
    
    
    function __construct ($by,$lokasi,$tanggal) {
        $this->jadwal = array();

        $this->lokasi = new Lokasi($by);
        $this->lokasi->setRequest($lokasi);

        $this->tanggal = new Tanggal();
        $this->tanggal->setRequest($tanggal);

        $this->baseurl = "https://api.myquran.com/v1/sholat/jadwal/";
    }

    private function process($lokasi,$tanggal){
        // echo count($lokasi);
        // var_dump($lokasi);
        // die;
        $arrLok = is_array($lokasi);
        if(!$arrLok){
            $this->callAPI($lokasi,$tanggal);
        }else{
            foreach($lokasi as $l){
                $this->callAPI($l,$tanggal);
            }
        }

        return $this->jadwal;
    }

    private function callAPI($lokasi,$tanggal){
        try{
            $data = file_get_contents($this->baseurl."/$lokasi"."/".implode("/",array_reverse($tanggal)));
            $data = json_decode($data);

            if($data->status){
                array_push($this->jadwal, $data->data);
            }else{
                throw new Exception("not found");
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getData(){
        $process = $this->process($this->lokasi->getResponse(),$this->tanggal->getResponse());
        // return count($process);
        return count($process) > 1 ? $process : $process[0];
    }
}