<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['title','description','sorting','contenttype_id','section_id'];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }
    
}
