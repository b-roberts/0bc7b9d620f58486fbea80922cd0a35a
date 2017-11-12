<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Snipe\BanBuilder\CensorWords;

class Comment extends Model
{
    //
    protected $fillable = ['user_id','schematic_id','description'];
    public function author()
    {
    return $this->belongsTo('\App\User','user_id');
    }

    public function setDescriptionAttribute($value)
    {
      $wordCensor = new CensorWords;
      $this->attributes['description'] = $wordCensor->censorString($value)['clean'];
    }
    /**
     * Get all of the Comment's Abuse Reports.
     */
    public function abuseReports()
    {
        return $this->morphMany('App\AbuseReport', 'reportable');
    }
}
