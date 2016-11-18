<?php
namespace App\Http\Controllers;

use App\Logic\Plata\DiffInHour;
use App\Logic\Plata\InputFields;
use App\Logic\Plata\NormaKarakteri;
use Illuminate\Http\Request;

class IzracunavanjePlateController extends Controller
{
    
    public function index()
    {
        return view('plata');
    }
    
    
    
    public function plata(Request $request)
    {
        $sati = new DiffInHour();
        $ukupnoRadnihDana = $sati->ukupanBrojRadnihDana($request);
        $danaOdmora = $sati->brojDanaOdmora($request);
        $ukupnoKaraktera = NormaKarakteri::ukupnoKaraktera($request);
        $razlika = NormaKarakteri::ukupnaRazlikaPredatihIObaveznihKaraktera($request);
        $od = InputFields::fromDate($request);
        $mesecnaNorma = NormaKarakteri::mesecneNorme($request);
    
        return view('plata',
            compact('ukupnoRadnihDana', 'danaOdmora', 'ukupnoKaraktera', 'razlika', 'od',
                'mesecnaNorma'));
    }
    
    
    
    public function datumi(Request $request)
    {
        
    }
}
