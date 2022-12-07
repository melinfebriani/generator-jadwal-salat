<?php
namespace Kelompok5\GeneratorJadwalSholat;

class TanggalCreator extends Creator {
    private $tanggal;

    public function __construct($tanggal) {
        $this->tanggal = $tanggal;
    }

    public function createData() {
        return new Tanggal($this->tanggal);
    }
}