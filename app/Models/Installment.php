<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
   
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['amount','type','paidamount','sale_id','user_id'];

    public function sales($value='')
    {
    	return $this->belongsTo('App\Models\Sale');
    }

    public function courses($value='')
	{
		return $this->belongsToMany('App\Models\Course')->withTimestamps();
	}
}
