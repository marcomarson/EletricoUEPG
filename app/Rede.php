<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
    public $timestamps = false;
    protected $table = 'rede';
    protected $primaryKey = 'poste_id';
    public $incrementing = false;
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'poste_id', 'poste_ativo', 'poste_numero', 'derivacao_numero', 'data_id'

      ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   public function poste() {
       return $this->belongsTo('\App\Poste', 'poste_id', 'poste_id');
   }
   public function data() {
       return $this->belongsTo('\App\Data', 'data_id', 'data_id');
   }



}
