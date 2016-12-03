<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petala extends Model
{
  public $timestamps = false;
  protected $table = 'petala';
  protected $primaryKey = 'petala_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'lampada1', 'lampada2', 'lampada3', 'lampada4', 'petala_nome', 'petala_numero',
     'lampada_id', 'data_id', 'Parent_petala_id'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function data() {
     return $this->belongsTo('\App\Data', 'data_id', 'data_id');
 }
 public function petala() {
     return $this->belongsTo('\App\Lampada', 'lampada_id', 'lampada_id');
 }
}
