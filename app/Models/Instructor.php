<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['headline',
   						 'bio',
   						 'website',
               'twitter',
   						 'facebook',
   						 'linkedin',
   						 'youtube',
               'instagram',
               'status',
               'user_id'				 
							];

    public function user($value='')
    {
      return $this->belongsTo('App\Models\User');
    }
}
