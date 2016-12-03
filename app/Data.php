<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
  public $timestamps = false;
  protected $table = 'data';
  protected $primaryKey = 'data_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'data_1', 'data_2','data_3', 'data_4',
     'data_queimada1', 'data_queimada2','data_queimada3', 'data_queimada4'
 ];

}
