<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['name','category_id'];
     public function category()
  {
      return $this->belongsTo('App\Category');
  }

   public function courses()
  {
      return $this->hasMany('App\Course');
  }
}
