<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampada extends Model
{
  public $timestamps = false;
  protected $table = 'lampada';
  protected $primaryKey = 'lampada_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'modelo', 'descricao', 'potencia', 'lampada_letra'
 ];

}
