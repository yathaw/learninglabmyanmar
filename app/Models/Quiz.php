<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['question','type','timer','test_id'];

    public function test(){
    	return $this->belongsTo('App\Models\Test');
    }

    public function checks()
    {
        return $this->hasMany('App\Models\Check');
    }

    public function responsedetail()
    {
        return $this->hasOne('App\Models\Responsedetail');
    }
}
