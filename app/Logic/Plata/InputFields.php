<?php
namespace App\Logic\Plata;

use Illuminate\Http\Request;

class InputFields
{
    
    public static function filterFields(Request $request)
    {
        return insertValuesFromPostRequestIntoArray(6, $request->except('_token'));
        
    }
    
    
    
    public static function fromDate(Request $request)
    {
        return self::filterFields($request)[0];
    }
    
    
    
    public static function toDate(Request $request)
    {
        return self::filterFields($request)[1];
    }
    
    
    
    public static function plata(Request $request)
    {
        return self::filterFields($request)[2];
    }
    
    
    
    public static function odmor(Request $request)
    {
        return self::filterFields($request)[3];
    }
    
    
    
    public static function predatoKaraktera(Request $request)
    {
        return self::filterFields($request)[4];
    }
    
    
    
    public static function datumKursa(Request $request)
    {
        return self::filterFields($request)[5];
    }
}