<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\AnswerNotification;
use Illuminate\Notifications\ReplyNotification;
use Illuminate\Notifications\Notifiable;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $fillable=['description','question_id','user_id'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function question(){
      return $this->belongsTo('App\Models\Question');
    }
}
