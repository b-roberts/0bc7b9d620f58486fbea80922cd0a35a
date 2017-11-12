<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbuseReport extends Model
{
  protected $fillable=['type','description','reportable_id','reportable_type'];
  /**
   * Get all of the owning commentable models.
   */
  public function reportable()
  {
      return $this->morphTo();
  }
  public function category()
  {
    return $this->belongsTo('App\AbuseReportCategory');
  }
}
