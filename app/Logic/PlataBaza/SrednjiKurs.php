<?php
namespace App\Logic\PlataBaza;

class SrednjiKurs extends InputFields
{
    
    protected $api_id = '5a4542003e184f3de04640035bfd275a';
    
    
    
    public function address($datum)
    {
        return "http://api.kursna-lista.info/".$this->api_id."/kl_na_dan/".$datum."/json";
    }
    
    
    
    public function getPageContent()
    {
        $date = date('d.m.Y', strtotime($this->datumKursa()));
        $content = file_get_contents($this->address($date));
        if (empty($content)) {
            die('Greška u preuzimanju podataka');
        }
        
        return $content;
    }
    
    
    
    public function kurseviEvra()
    {
        $data = json_decode($this->getPageContent(), true);
        
        return $data['result']['eur']['sre'];
        
    }
    
    
    
    public function plataUEvrima()
    {
        return $this->plata() / $this->kurseviEvra();
    }
}


//$kurs = new SrednjiKurs();
//echo $kurs->srednjiKursEvra();