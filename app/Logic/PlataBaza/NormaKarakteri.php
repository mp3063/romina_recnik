<?php
namespace App\Logic\PlataBaza;

class NormaKarakteri extends InputFields
{
    
    public function mesecneNorme()
    {
        $mesecnaNorma = ($this->dnevnaNorma() * $this->radniDaniOdmorInstance()
                                                     ->brojRadnihDanaSaOdmorom());
        
        return $mesecnaNorma;
    }
    
    
    
    public function ukupnoKaraktera()
    {
        return round($this->mesecneNorme());
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
        $dnevnaNorma = (($plataUEvrima / 5) * 1800) / $this->radniDaniOdmorInstance()
                                                           ->nizRadnihDana();
        
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
