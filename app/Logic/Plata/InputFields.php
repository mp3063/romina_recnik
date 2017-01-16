<?php
namespace App\Logic\Plata;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InputFields
{
    
    protected $request;
    
    
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    
    
    public function filterFields()
    {
        return insertValuesFromPostRequestIntoArray(6, $this->request->except('_token'));
        
    }
    
    
    
    public function fromDate()
    {
        $fromDate = $this->isIsset($this->filterFields()[0]);
        $niz = [];
        foreach ($fromDate as $from) {
            $niz[] = Carbon::parse($from);
        }
        
        return $niz;
    }
    
    
    
    public function toDate()
    {
        $toDate = $this->isIsset($this->filterFields()[1]);
        $niz = [];
        foreach ($toDate as $to) {
            $date = Carbon::parse($to);
            $niz[] = $date->addDay();
        }
        
        return $niz;
    }
    
    
    
    public function plata()
    {
        return $this->isIsset($this->filterFields()[2]);
    }
    
    
    
    public function odmor()
    {
        return $this->isIsset($this->filterFields()[3]);
    }
    
    
    
    public function predatoKaraktera()
    {
        return $this->isIsset($this->filterFields()[4]);
    }
    
    
    
    public function datumKursa()
    {
        return $this->isIsset($this->filterFields()[5]);
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