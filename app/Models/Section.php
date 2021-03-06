<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['title','objective','sorting','course_id'];

    public function course(){
    	return $this->belongsTo('App\Models\Course');
    }

    public function contents()
    {
        return $this->hasMany('App\Models\Content');
    }

    public function test(){
        return $this->hasOne('App\Models\Test');
    }
}
