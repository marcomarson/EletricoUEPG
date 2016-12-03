<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControleLampada extends Model
{
     public $timestamps = false;
     protected $table = 'controlelampada';
     protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'petala_id', 'poste_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function poste() {
        return $this->belongsTo('\App\Poste', 'poste_id', 'poste_id');
    }
    public function petala() {
        return $this->belongsTo('\App\Petala', 'petala_id', 'petala_id');
    }

}
