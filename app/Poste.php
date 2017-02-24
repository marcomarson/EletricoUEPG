<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    public $timestamps = false;
    protected $table = 'poste';
    protected $primaryKey = 'poste_id';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'luminaria1', 'luminaria2', 'luminaria3', 'luminaria4', 'luminaria5', 'luminaria_id', 'poste_ativo'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   public function luminaria() {
       return $this->belongsTo('\App\Luminaria', 'luminaria_id', 'luminaria_id');
   }

   public function rede() {
       return $this->hasMany('\App\Rede');
   }
   public function petala() {
       return $this->hasMany('\App\Petala');
   }



}
