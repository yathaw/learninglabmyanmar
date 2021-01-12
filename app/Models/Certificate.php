<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Certificate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['verifycode','date','user_id','course_id'];

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function course(){
      return $this->belongsTo('App\Models\Course');
    }

}
