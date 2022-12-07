<?php
namespace Kelompok5\GeneratorJadwalSholat;

abstract class Creator {
    abstract public function createData();

    public function response()
    {
        $data = $this->createData();
        return $data->getResponse();
    }
}