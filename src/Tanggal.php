<?php

namespace Kelompok5\GeneratorJadwalSholat;


class Tanggal implements DataModel{
    private $req;
    private $res;

    public function setRequest($r){
        $this->req = $r;
    }

    private function setResponse($r){
        $this->res = $r;
    }

    private function reqProcess(){
        $set = explode("-",$this->req);
        $this->setResponse($set);
    }
    public function getResponse(){
        $this->reqProcess();
        return $this->res;
    }
}