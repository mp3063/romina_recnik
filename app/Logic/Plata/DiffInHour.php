<?php
namespace App\Logic\Plata;

use Carbon\Carbon;

class DiffInHour
{
    
    use InputFields;
    
    
    
    public function nizRadnihDana()
    {
        $from_date = $this->fromDate();
        $to_date = $this->toDate();
        $num = 0;
        while ($num < count($from_date)) {
            $from = Carbon::parse($from_date[$num]);
            $to = Carbon::parse($to_date[$num]);
            $days = $from->diffInDays($to);
            if ($to->isWeekday()) {
                $dani[] = (($days + 1) - ($from->diffInWeekendDays($to)));
            } else {
                $dani[] = ($days - ($from->diffInWeekendDays($to)));
            }
            $num++;
        }
        if (isset($dani)) {
            return $dani;
        } else {
            return [];
        }
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
