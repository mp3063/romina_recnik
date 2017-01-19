<?php
namespace App\Http\Controllers;

use App\ProracunPlate;
use Illuminate\Http\Request;

class PlataBazaController extends Controller
{
    
    public function index()
    {
        return view('plata-baza');
    }
    
    
    
    public function create($id)
    {
        
    }
    
    
    
    public function store(Request $request)
    {
        ProracunPlate::create($request->all());
    }
}
