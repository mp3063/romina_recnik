<?php
namespace App\Logic\Plata;

use Illuminate\Http\Request;

class SrednjiKurs
{
    
    public $website;
    public $api_id = '5a4542003e184f3de04640035bfd275a';
    
    
    
    public function address($datum)
    {
        return "http://api.kursna-lista.info/".$this->api_id."/kl_na_dan/".$datum."/json";
    }
    
    
    
    public function getPageContent(Request $request)
    {
        $input = InputFields::datumKursa($request);
        $content = [];
        if (null !== $input) {
            foreach ($input as $datum) {
                $date = date('d.m.Y', strtotime($datum));
                $content[] = file_get_contents($this->address($date));
            }
            if (empty($content)) {
                die('Greška u preuzimanju podataka');
            }
        }
        
        return $content;
    }
    
    
    
    public function kurseviEvra(Request $request)
    {
        $data = [];
        $kursevi = [];
        $content = $this->getPageContent($request);
        foreach ($content as $page) {
            $data[] = json_decode($page, true);
        }
        foreach ($data as $page) {
            $kursevi[] = $page['result']['eur']['sre'];
        }
        
        return $kursevi;
        
    }
    
    
    
    public function plataUEvrima(Request $request)
    {
        $plataUEvrima = [];
        if (null !== InputFields::plata($request)) {
            $plata = InputFields::plata($request);
        }
        $i = 0;
        if (isset($plata)) {
            foreach ($plata as $plat) {
                $plataUEvrima[] = $plat / $this->kurseviEvra()[$i];
                $i++;
            }
        }
        
        return $plataUEvrima;
    }
}


//$kurs = new SrednjiKurs();
//echo $kurs->srednjiKursEvra();