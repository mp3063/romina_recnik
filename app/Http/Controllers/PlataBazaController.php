<?php
namespace App\Http\Controllers;

use App\Logic\PlataBaza\NormaKarakteri;
use App\Logic\PlataBaza\RadniDaniOdmor;
use App\ProracunPlate;
use Illuminate\Http\Request;

class PlataBazaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    
    public function index(Request $request)
    {
        $norma = new NormaKarakteri($request);
        $ukupnaNorma = $norma->ukupnoKaraktera();
        $proracunPlate = ProracunPlate::all();
    
        return view('plata-baza', compact('proracunPlate', 'ukupnaNorma'));
    }
    
    
    
    public function edit($id)
    {
        $red = ProracunPlate::find($id);
    
        return $red;
    }
    
    
    
    public function update(Request $request, $id)
    {
        $normaKarakteri = new NormaKarakteri($request);
        $radniDani = new RadniDaniOdmor($request);
        $red = ProracunPlate::find($id);
        $red->update([
            'datum_od'          => $request->input('datum_od'),
            'datum_do'          => $request->input('datum_do'),
            'plata_iznos'       => $request->input('plata_iznos'),
            'odmor'             => $request->input('odmor'),
            'predato_karaktera' => $request->input('predato_karaktera'),
            'datum_kursa'       => $request->input('datum_kursa'),
            'norma'             => $normaKarakteri->mesecneNorme(),
            'radnih_dana'       => $radniDani->nizRadnihDana(),
            'dana_radio'        => $radniDani->brojRadnihDanaSaOdmorom(),
        ]);
        
        return redirect('plata-baza');
    }
    
    
    
    public function store(Request $request)
    {
        $normaKarakteri = new NormaKarakteri($request);
        $radniDani = new RadniDaniOdmor($request);
        ProracunPlate::create([
            'datum_od'          => $request->input('datum_od'),
            'datum_do'          => $request->input('datum_do'),
            'plata_iznos'       => $request->input('plata_iznos'),
            'odmor'             => $request->input('odmor'),
            'predato_karaktera' => $request->input('predato_karaktera'),
            'datum_kursa'       => $request->input('datum_kursa'),
            'norma'             => $normaKarakteri->mesecneNorme(),
            'radnih_dana'       => $radniDani->nizRadnihDana(),
            'dana_radio'        => $radniDani->brojRadnihDanaSaOdmorom(),
        ]);
        
        return redirect('/plata-baza');
    }
    
    
    
    public function destroy($id)
    {
        ProracunPlate::destroy($id);
        
        return redirect('plata-baza');
    }
}
