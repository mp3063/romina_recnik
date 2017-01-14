<?php
namespace App\Http\Controllers;

use App\Logic\Plata\RadniDaniOdmor;
use App\Logic\Plata\InputFields;
use App\Logic\Plata\NormaKarakteri;
use Illuminate\Http\Request;

class IzracunavanjePlateController extends Controller
{
    
    use InputFields;
    
    
    
    public function index()
    {
        return view('plata');
    }
    
    
    
    public function plataController()
    {
        $diffInHour = new RadniDaniOdmor($this->request);
        $normaKarakteri = new NormaKarakteri($this->request);
        $ukupnoRadnihDana = $diffInHour->ukupanBrojRadnihDana();
        $danaOdmora = $diffInHour->brojDanaOdmora();
        $ukupnoKaraktera = $normaKarakteri->ukupnoKaraktera();
        $razlika = $normaKarakteri->ukupnaRazlikaPredatihIObaveznihKaraktera();
        $od = $this->fromDate();
        $mesecnaNorma = $normaKarakteri->mesecneNorme();
        
        return view('plata',
            compact('ukupnoRadnihDana', 'danaOdmora', 'ukupnoKaraktera', 'razlika', 'od',
                'mesecnaNorma'));
    }
    
    
    
    public function datumi(Request $request)
    {
        
    }
}
