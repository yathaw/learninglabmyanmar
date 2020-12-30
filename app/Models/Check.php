<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Check extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['answer','rightanswer','quiz_id', 'mark'];


    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function responsedetail()
    {
        return $this->hasOne('App\Models\Responsedetail');
    }
}
