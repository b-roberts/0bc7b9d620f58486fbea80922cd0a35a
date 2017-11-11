<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['user_id','schematic_id','description'];
    public function author()
    {
    return $this->belongsTo('\App\User','user_id');
    }
}
