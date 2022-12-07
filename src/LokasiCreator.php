<?php
namespace Kelompok5\GeneratorJadwalSholat;

class LokasiCreator extends Creator {
    private $by;
    private $lokasi;

    public function __construct($by, $lokasi) {
        $this->by = $by;
        $this->lokasi = $lokasi;
    }

    public function createData() {
        return new Lokasi($this->by, $this->lokasi);
    }
}