<?php
namespace App\Logic\PlataBaza;

use App\ProracunPlate;

class NormaKarakteri extends InputFields
{
    
    public function mesecneNorme()
    {
        $mesecnaNorma = ($this->dnevnaNorma() * $this->radniDaniOdmorInstance()->brojRadnihDanaSaOdmorom());
        
        return $mesecnaNorma;
    }
    
    
    
    public function proracunPlateCollection()
    {
        return collect(ProracunPlate::all());
    }
    
    
    
    public function ukupnoKaraktera()
    {
        $norma = $this->proracunPlateCollection()->pluck('norma');
        
        return array_sum($norma->all());
    }
    
    
    
    public function razlikaIzmedjuObaveznihIPredatihKaraktera()
    {
        return $this->predatoKaraktera() - $this->mesecneNorme();
    }
    
    
    
    public function ukupnaRazlikaPredatihIObaveznihKaraktera()
    {
        return round($this->razlikaIzmedjuObaveznihIPredatihKaraktera());
    }
    
    
    
    public function dnevnaNorma()
    {
        $plataUEvrima = $this->plata() / $this->srednjiKursInstance()->kurseviEvra();
        $dnevnaNorma = (($plataUEvrima / 5) * 1800) / $this->radniDaniOdmorInstance()->nizRadnihDana();
        
        return $dnevnaNorma;
    }
    
    
    
    protected function radniDaniOdmorInstance()
    {
        return new RadniDaniOdmor($this->request);
    }
    
    
    
    protected function srednjiKursInstance()
    {
        return new SrednjiKurs($this->request);
    }
}


"dnevna norma = (Plata / 5)*1800 / broj radnih dana u mesecu";
"mesecna norma = dnevna norma * broj odradjenih dana";
