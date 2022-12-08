<?php

namespace Kelompok5\GeneratorJadwalSholat;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider {
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'jadwalSalat'); 
        $this->loadViewsFrom(__DIR__.'/views/components', 'header'); 
        $this->publishes([
            __DIR__.'/views/jadwalSalat.blade.php' => public_path('resources/views'),
        ], 'public');       
    }
}

