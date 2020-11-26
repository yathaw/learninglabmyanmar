<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Responsedetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['check_id','quiz_id','response_id'];
}
