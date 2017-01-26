<?php
namespace App\Logic\PlataBaza;

class RadniDaniOdmor extends InputFields
{
    
    public function nizRadnihDana()
    {
        $fromDate = $this->fromDate();
        $toDate = $this->toDate();
        $days = $fromDate->diffInDays($toDate);
        $dani = ($days - ($fromDate->diffInWeekendDays($toDate)));
        
        return $dani;
    }
    
    
    
    public function ukupanBrojRadnihDana()
    {
        return $this->nizRadnihDana();
    }
    
    
    
    public function brojRadnihDanaSaOdmorom()
    {
        $daniSaOdmorom = $this->nizRadnihDana() - $this->odmor();
        
        return $daniSaOdmorom;
    }
    
    
    
    public function brojDanaOdmora()
    {
        return $this->brojRadnihDanaSaOdmorom();
    }
}
