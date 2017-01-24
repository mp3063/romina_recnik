<?php
namespace App\Http\Controllers;

use App\Logic\PlataBaza\NormaKarakteri;
use App\Logic\PlataBaza\RadniDaniOdmor;
use App\ProracunPlate;
use Illuminate\Http\Request;
use Ramsey\Uuid\Generator\CombGenerator;

class PlataBazaController extends Controller
{
    
    public function index()
    {
        $proracunPlate = ProracunPlate::all();
        
        return view('plata-baza', compact('proracunPlate'));
    }
    
    
    
    public function edit($id)
    {
        $red = ProracunPlate::find($id);
        
        return view('partials.modal_update_plata', compact('red'));
    }
    
    
    
    public function update(Request $request, $id)
    {
        $red = ProracunPlate::find($id);
        $red->update($request->all());
        
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
