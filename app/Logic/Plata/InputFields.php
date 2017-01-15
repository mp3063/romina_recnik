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
        return $this->filterFields()[0][0];
    }
    
    
    
    public function toDate()
    {
        return $this->filterFields()[1][0];
    }
    
    
    
    public function plata()
    {
        return $this->filterFields()[2][0];
    }
    
    
    
    public function odmor()
    {
        return $this->filterFields()[3][0];
    }
    
    
    
    public function predatoKaraktera()
    {
        return $this->filterFields()[4][0];
    }
    
    
    
    public function datumKursa()
    {
        return $this->filterFields()[5][0];
    }
}