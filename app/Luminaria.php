<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
  public $timestamps = false;
  protected $table = 'luminaria';
  protected $primaryKey = 'luminaria_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'modelo', 'descricao', 'potencia', 'luminaria_letra', 'luminaria_ativa'
 ];


 public function poste()
    {
        return $this->hasMany('App\Poste');
    }

}
