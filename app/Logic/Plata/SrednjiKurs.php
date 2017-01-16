<?php
namespace App\Logic\Plata;

class SrednjiKurs extends InputFields
{
    
    protected $api_id = '5a4542003e184f3de04640035bfd275a';
    
    
    
    public function address($datum)
    {
        return "http://api.kursna-lista.info/".$this->api_id."/kl_na_dan/".$datum."/json";
    }
    
    
    
    public function getPageContent()
    {
        $input = $this->datumKursa();
        $content = [];
        foreach ($input as $datum) {
            $date = date('d.m.Y', strtotime($datum));
            $content[] = file_get_contents($this->address($date));
        }
        if (empty($content)) {
            die('Greška u preuzimanju podataka');
        }
        
        return $content;
    }
    
    
    
    public function kurseviEvra()
    {
        $data = [];
        $kursevi = [];
        $content = $this->getPageContent();
        foreach ($content as $page) {
            $data[] = json_decode($page, true);
        }
        foreach ($data as $page) {
            $kursevi[] = $page['result']['eur']['sre'];
        }
        
        return $kursevi;
        
    }
    
    
    
    public function plataUEvrima()
    {
        $plataUEvrima = [];
        $plata = $this->plata();
        $i = 0;
        foreach ($plata as $plat) {
            $plataUEvrima[] = $plat / $this->kurseviEvra()[$i];
            $i++;
        }
        
        return $plataUEvrima;
    }
}


//$kurs = new SrednjiKurs();
//echo $kurs->srednjiKursEvra();