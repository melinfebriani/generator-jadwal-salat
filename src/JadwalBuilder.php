<?php
namespace Kelompok5\GeneratorJadwalSholat;

use DateTime;

class JadwalBuilder {
    private $by = "provinsi";
    private $lokasi = "jawa timur";
    private $tanggal = null;

    public function setBy($by) {
        $this->by = $by;
        return $this;
    }

    public function setLokasi($lokasi) {
        $this->lokasi = $lokasi;
        return $this;
    }

    public function setTanggal($tanggal) {
        $this->tanggal = $tanggal;
        return $this;
    }

    public function build(): Core {
        if($this->tanggal == null) {
            $this->tanggal = date('d-m-Y');
        }
        return new Core($this->by, $this->lokasi, $this->tanggal);
    }
}