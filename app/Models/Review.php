<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['description','stars','user_id','course_id'];

    // NYL
    public function course($value='')
	{
		return $this->belongsTo('App\Models\Course');
	}

	public function user($value='')
	{
		return $this->belongsTo('App\Models\User');
	}
}
