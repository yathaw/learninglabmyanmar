<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Collection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','description','user_id'];

    public function courses($value='')
    {
    	return $this->belongsToMany('App\Models\Course')->withPivot('sorting')->withTimestamps();
    }

}
