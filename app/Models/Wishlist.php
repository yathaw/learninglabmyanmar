<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['user_id','course_id'];

    public function user($value='')
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function course($value='')
	{
		return $this->belongsTo('App\Models\Course');
	}
}
