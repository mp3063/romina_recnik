<?php
namespace App\Logic\Plata;

use Illuminate\Http\Request;

trait InputFields
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
        return $this->filterFields($this->request)[0][0]->all();
    }
    
    
    
    public function toDate()
    {
        return $this->filterFields($this->request)[1][0]->all();
    }
    
    
    
    public function plata()
    {
        return $this->filterFields($this->request)[2][0]->all();
    }
    
    
    
    public function odmor()
    {
        return $this->filterFields($this->request)[3][0]->all();
    }
    
    
    
    public function predatoKaraktera()
    {
        return $this->filterFields($this->request)[4][0]->all();
    }
    
    
    
    public function datumKursa()
    {
        return $this->filterFields($this->request)[5][0]->all();
    }
}