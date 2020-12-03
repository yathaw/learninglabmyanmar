<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['invoiceno','total','user_id'];

    public function courses($value='')
    {
    	return $this->belongsToMany('App\Models\Course')->withTimestamps();
    }
}
