<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'companies';


    protected $fillable=['name','logo','address','description'];

    public function user($value='')
    {
    	return $this->hasMany('App\Models\User');
    }

}
