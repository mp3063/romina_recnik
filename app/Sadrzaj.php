<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Sadrzaj extends Model
{
    
    protected $table    = 'sadrzaj';
    protected $fillable = ['id_recnika', 'engleski', 'srpski'];
    
    
    
    public function recnika()
    {
        return $this->belongsTo('App\RecniciImena', 'id_recnika', 'id');
    }
}
