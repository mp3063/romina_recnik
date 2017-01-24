<?php
namespace App\Logic\PlataBaza;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InputFields
{
    
    protected $request;
    
    
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    
    
    public function fromDate()
    {
        $fromDate = $this->isIsset($this->request->input('datum_od'));
        $fromDate = Carbon::parse($fromDate);
        
        return $fromDate;
    }
    
    
    
    public function toDate()
    {
        $toDate = $this->isIsset($this->request->input('datum_do'));
        $toDate = Carbon::parse($toDate)->addDay();
        
        return $toDate;
    }
    
    
    
    public function plata()
    {
        return $this->isIsset($this->request->input('plata_iznos'));
    }
    
    
    
    public function odmor()
    {
        return $this->isIsset($this->request->input('odmor'));
    }
    
    
    
    public function predatoKaraktera()
    {
        return $this->isIsset($this->request->input('predato_karaktera'));
    }
    
    
    
    public function datumKursa()
    {
        return $this->isIsset($this->request->input('datum_kursa'));
    }
    
    
    
    public function isIsset($value)
    {
        if (isset($value)) {
            return $value;
        } else {
            return [];
        }
    }
}