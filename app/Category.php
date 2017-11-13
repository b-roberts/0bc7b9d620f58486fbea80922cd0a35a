<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
  public function schematics()
  {
    return $this->hasMany('\App\Schematic');
  }
}
