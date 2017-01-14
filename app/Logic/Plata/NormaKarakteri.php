<?php
namespace App\Logic\Plata;

class NormaKarakteri
{
    
    use InputFields;
    
    
    
    public function ukupnoKaraktera()
    {
        list($radniDani, $dnevnaNorma) = $this->dnevnaNorma();
        $sum = 0;
        $k = 0;
        foreach ($radniDani->brojRadnihDanaSaOdmorom() as $odmor) {
            $sum += ($dnevnaNorma[$k++] * $odmor);
        }
        
        return round($sum);
    }
    
    
    
    public function mesecneNorme()
    {
        list($radniDani, $dnevnaNorma) = $this->dnevnaNorma();
        $k = 0;
        $mesecnaNorma = [];
        foreach ($radniDani->brojRadnihDanaSaOdmorom() as $odmor) {
            $mesecnaNorma[] = ($dnevnaNorma[$k++] * $odmor);
        }
        
        return $mesecnaNorma;
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
        $sum = 0;
        foreach ($this->razlikaIzmedjuObaveznihIPredatihKaraktera() as $mesecno) {
            $sum += $mesecno;
        }
        
        return round($sum);
    }
    
    
    
    /**
     * @param \Illuminate\Http\
     *
     * @return array
     */
    public function dnevnaNorma(): array
    {
        $radniDani = new DiffInHour($this->request);
        $evro = new SrednjiKurs($this->request);
        $dnevnaNorma = [];
        $plata = $this->plata();
        $i = 0;
        foreach ($radniDani->nizRadnihDana() as $radni) {
            $plataUEvrima = $plata[$i] / $evro->kurseviEvra()[$i];
            $dnevnaNorma[] = (($plataUEvrima / 5) * 1800) / $radni;
            $i++;
        }
        
        return [$radniDani, $dnevnaNorma];
    }
}


"dnevna norma = (Plata / 5)*1800 / broj radnih dana u mesecu";
"mesecna norma = dnevna norma * broj odradjenih dana";
