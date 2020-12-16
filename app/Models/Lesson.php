<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['file','type','content_id','duration','file_upload'];

    public function content()
  	{
		return $this->belongsTo('App\Models\Content');
  	}

  	public function usesrs()
  	{
		return $this->belongsToMany('App\Models\User')->withPivot('status','timeline')->withTimestamps();
  	}
}
