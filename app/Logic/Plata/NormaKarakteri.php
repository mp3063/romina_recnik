<?php
namespace App\Logic\Plata;

use Illuminate\Http\Request;

class NormaKarakteri
{
    
    public static function ukupnoKaraktera(Request $request)
    {
        list($radniDani, $dnevnaNorma) = self::dnevnaNorma($request);
        $sum = 0;
        $k = 0;
        foreach ($radniDani->brojRadnihDanaSaOdmorom($request) as $odmor) {
            $sum += ($dnevnaNorma[$k++] * $odmor);
        }
        
        return round($sum);
    }
    
    
    
    public static function mesecneNorme(Request $request)
    {
        list($radniDani, $dnevnaNorma) = self::dnevnaNorma($request);
        $k = 0;
        $mesecnaNorma = [];
        foreach ($radniDani->brojRadnihDanaSaOdmorom($request) as $odmor) {
            $mesecnaNorma[] = ($dnevnaNorma[$k++] * $odmor);
        }
        
        return $mesecnaNorma;
    }
    
    
    
    public static function razlikaIzmedjuObaveznihIPredatihKaraktera(Request $request)
    {
        $i = 0;
        $razlika = [];
        foreach (self::mesecneNorme($request) as $norma) {
            $razlika[] = InputFields::predatoKaraktera($request)[$i] - $norma;
            $i++;
        }
        
        return $razlika;
    }
    
    
    
    public static function ukupnaRazlikaPredatihIObaveznihKaraktera(Request $request)
    {
        $sum = 0;
        foreach (self::razlikaIzmedjuObaveznihIPredatihKaraktera($request) as $mesecno) {
            $sum += $mesecno;
        }
        
        return round($sum);
    }
    
    
    
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public static function dnevnaNorma(Request $request):array
    {
        $radniDani = new DiffInHour();
        $evro = new SrednjiKurs();
        $dnevnaNorma = [];
        $plata = InputFields::plata($request);
        $i = 0;
        foreach ($radniDani->nizRadnihDana($request) as $radni) {
            $plataUEvrima = $plata[$i] / $evro->kurseviEvra($request)[$i];
            $dnevnaNorma[] = (($plataUEvrima / 5) * 1800) / $radni;
            $i++;
        }
        
        return [$radniDani, $dnevnaNorma];
    }
}


"dnevna norma = (Plata / 5)*1800 / broj radnih dana u mesecu";
"mesecna norma = dnevna norma * broj odradjenih dana";
