<?php
namespace App\Logic\Plata;

class NormaKarakteri extends InputFields
{
    
    public function mesecneNorme()
    {
        $dnevnaNorma = $this->dnevnaNorma();
        $k = 0;
        $mesecnaNorma = [];
        foreach ($this->radniDaniOdmorInstance()->brojRadnihDanaSaOdmorom() as $odmor) {
            $mesecnaNorma[] = ($dnevnaNorma[$k++] * $odmor);
        }
        
        return $mesecnaNorma;
    }
    
    
    
    public function ukupnoKaraktera()
    {
        return round(array_sum($this->mesecneNorme()));
    }
    
    
    
    public function razlikaIzmedjuObaveznihIPredatihKaraktera()
    {
        $i = 0;
        $razlika = [];
        foreach ($this->mesecneNorme() as $norma) {
            $razlika[] = $this->predatoKaraktera()[$i] - $norma;
            $i++;
        }
        
        return $razlika;
    }
    
    
    
    public function ukupnaRazlikaPredatihIObaveznihKaraktera()
    {
        return round(array_sum($this->razlikaIzmedjuObaveznihIPredatihKaraktera()));
    }
    
    
    
    public function dnevnaNorma()
    {
        $dnevnaNorma = [];
        $plata = $this->plata();
        $i = 0;
        foreach ($this->radniDaniOdmorInstance()->nizRadnihDana() as $radni) {
            $plataUEvrima = $plata[$i] / $this->srednjiKursInstance()->kurseviEvra()[$i];
            $dnevnaNorma[] = (($plataUEvrima / 5) * 1800) / $radni;
            $i++;
        }
    
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
