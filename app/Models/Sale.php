<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['invoiceno','total','user_id','status'];

    public function courses($value='')
    {
    	return $this->belongsToMany('App\Models\Course')->withPivot('status')->withTimestamps();
    }

    public function user($value='')
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function installments($value='')
    {
        return $this->hasMany('App\Models\Installment');
        
    }
}
