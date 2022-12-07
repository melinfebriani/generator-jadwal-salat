<?php
namespace Kelompok5\GeneratorJadwalSholat;

use Exception;

class Core{
    private $baseurl;
    private $lokasi;
    private $tanggal;
    private $jadwal;
        
    function __construct ($by, $lokasi, $tanggal) {
        $this->jadwal = array();
        $this->lokasi = new LokasiCreator($by, $lokasi);
        $this->tanggal = new TanggalCreator($tanggal);     
        $this->baseurl = "https://api.myquran.com/v1/sholat/jadwal/";
    }

    private function process($lokasi,$tanggal){
        // echo count($lokasi);
        // var_dump($lokasi);
        // die;
        // $arrLok = is_array($lokasi);
        // if(!$arrLok){
        //     $this->callAPI($lokasi,$tanggal);
        // }else{
            foreach($lokasi as $l){
                $this->callAPI($l,$tanggal);
            }
        //}

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
        $process = $this->process($this->lokasi->response(),$this->tanggal->response());
        // return count($process);
        return $process;
    }
}