<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SotfDeletes;

class Attachment extends Model
{
    use HasFactory;
    use SotfDeletes;

    protected $fillable=['file','score','user_id','assignment_id'];
}
