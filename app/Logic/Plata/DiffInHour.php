<?php
namespace App\Logic\Plata;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DiffInHour
{
    
    public function nizRadnihDana(Request $request)
    {
        $from_date = InputFields::fromDate($request);
        $to_date = InputFields::toDate($request);
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
    
    
    
    public function ukupanBrojRadnihDana(Request $request)
    {
        $sum = 0;
        foreach ($this->nizRadnihDana($request) as $dan) {
            $sum += $dan;
        }
        
        return $sum;
    }
    
    
    
    public function brojRadnihDanaSaOdmorom(Request $request)
    {
        $odmor = InputFields::odmor($request);
        $daniSaOdmorom = [];
        $i = 0;
        foreach ($this->nizRadnihDana($request) as $ukupno) {
            $daniSaOdmorom[] = $ukupno - $odmor[$i++];
        }
        
        return $daniSaOdmorom;
    }
    
    
    
    public function brojDanaOdmora(Request $request)
    {
        $sum = 0;
        foreach ($this->brojRadnihDanaSaOdmorom($request) as $odmor) {
            $sum += $odmor;
        }
        
        return $sum;
    }
}
