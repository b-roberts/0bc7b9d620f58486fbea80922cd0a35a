<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Yaml\Yaml;
use \Snipe\BanBuilder\CensorWords;
use Laravel\Scout\Searchable;

class Schematic extends Model
{
    use Searchable;
    //
    protected $fillable=['title','description','category_id'];
    public function getYamlAttribute()
    {
      $value = Yaml::parse($this->filedata);
      return $value;
    }
    public function setDescriptionAttribute($value)
    {
      $wordCensor = new CensorWords;
      $this->attributes['description'] = $wordCensor->censorString($value)['clean'];
    }
    public function setTitleAttribute($value)
    {
      $wordCensor = new CensorWords;
      $this->attributes['title'] = $wordCensor->censorString($value)['clean'];
    }

    public function searchableAs()
    {
        return 'primary_index';
    }
    public function toSearchableArray()
    {
      $array = [
        'objectID'=>'schematic-' . $this->id,
        'title'=>$this->title,
        'description'=>$this->description,
        'downloads'=>$this->downloads->count(),
        'views'=>$this->views->count(),
        'likes'=>$this->likes->count(),
        'comments'=>$this->comments->count(),
        'created_at'=>$this->created_at->timestamp,
        'updated_at'=>$this->updated_at->timestamp,
        'author'=>$this->author->name,
        'category'=>$this->category->title,
        'category_id'=>$this->category->id
      ];

        return $array;
    }

    public function comments()
  {
    return $this->hasMany('\App\Comment');
  }
  public function views()
{
  return $this->hasMany('\App\View');
}
public function downloads()
{
return $this->hasMany('\App\Download');
}
public function likes()
{
return $this->hasMany('\App\Like');
}
public function author()
{
return $this->belongsTo('\App\User','user_id');
}
public function category()
{
return $this->belongsTo('\App\Category','category_id');
}
public function images()
{
return $this->hasMany('\App\Image');
}
/**
 * Get all of the Schematic's Abuse Reports.
 */
public function abuseReports()
{
    return $this->morphMany('App\AbuseReport', 'reportable');
}
}
