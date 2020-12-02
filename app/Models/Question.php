<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\QuestionNotification;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable=['title','description','course_id','user_id'];

    public function user(){
      return $this->belongsTo('App\Models\User');
    }
}
