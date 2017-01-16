<?php
namespace App\Logic\Plata;


class RadniDaniOdmor extends InputFields
{
    
    public function nizRadnihDana()
    {
        $fromDate = $this->fromDate();
        $toDate = $this->toDate();
        $num = 0;
        foreach ($fromDate as $from) {
            $days = $from->diffInDays($toDate[$num]);
            $dani[] = ($days - ($from->diffInWeekendDays($toDate[$num])));
            $num++;
        }
    
        return $dani;
    }
    
    
    
    public function ukupanBrojRadnihDana()
    {
        $sum = 0;
        foreach ($this->nizRadnihDana() as $dan) {
            $sum += $dan;
        }
        
        return $sum;
    }
    
    
    
    public function brojRadnihDanaSaOdmorom()
    {
        $odmor = $this->odmor();
        $daniSaOdmorom = [];
        $i = 0;
        foreach ($this->nizRadnihDana() as $ukupno) {
            $daniSaOdmorom[] = $ukupno - $odmor[$i++];
        }
        
        return $daniSaOdmorom;
    }
    
    
    
    public function brojDanaOdmora()
    {
        $sum = 0;
        foreach ($this->brojRadnihDanaSaOdmorom() as $odmor) {
            $sum += $odmor;
        }
        
        return $sum;
    }
}
