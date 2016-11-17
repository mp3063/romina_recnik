<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class RecniciImena extends Model
{
    
    protected $table    = 'recnici_imena';
    protected $fillable = ['recnici'];
    
    
    
    public function sadrzaj()
    {
        return $this->hasMany('App\Sadrzaj', 'id_recnika', 'id');
    }
}
