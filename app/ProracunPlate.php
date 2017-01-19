<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProracunPlate extends Model
{
    
    protected $table = 'proracun_plate';
    protected $fillable
                     = [
            'datum_od',
            'datum_do',
            'plata_iznos',
            'odmor',
            'predato_karaktera',
            'datum_kursa',
        ];
}
