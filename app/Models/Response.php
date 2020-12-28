<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['score','status','test_id','user_id'];

    public function test(){
    	return $this->belongsTo('App\Models\Test');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function responsedetails()
    {
        return $this->hasMany('App\Models\Responsedetail');
    }
}
