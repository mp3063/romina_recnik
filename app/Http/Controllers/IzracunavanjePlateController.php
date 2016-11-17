<?php
namespace App\Http\Controllers;

use App\Logic\Plata\InputFields;
use Illuminate\Http\Request;

class IzracunavanjePlateController extends Controller
{
    
    public function index()
    {
        return view('plata');
    }
    
    
    
    public function plata(Request $request)
    {
        return var_dump(InputFields::fromDate($request));
    }
}
