<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Responsedetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['check_id','quiz_id','response_id','status'];

    public function check(){
    	return $this->belongsTo('App\Models\Check');
    }

    public function quiz(){
    	return $this->belongsTo('App\Models\Quiz');
    }

    public function response(){
    	return $this->belongsTo('App\Models\Response');
    }

    
}
