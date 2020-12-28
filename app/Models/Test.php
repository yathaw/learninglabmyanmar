<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['title','description','section_id'];

    public function section(){
    	return $this->belongsTo('App\Models\Section');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Models\Quiz');
    }

    public function response()
    {
        return $this->hasOne('App\Models\Response');
    }
}
