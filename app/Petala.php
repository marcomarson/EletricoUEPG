<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petala extends Model
{
  public $timestamps = false;
  protected $table = 'petala';
  protected $primaryKey = 'poste_id';
  public $incrementing = false;
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
    'poste_id', 'petala_ativa', 'petala_numero', 'petala_nome'
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
