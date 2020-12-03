<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['title',
						'subtitle',
						'description',
						'image',
						'video',
						'situation',
						'status',
						'requirements',
						'outline',
						'certificate',
						'share',
						'price',
						'level_id',
						'subcategory_id',
						];


	public function instructors($value='')
	{
		return $this->belongsToMany('App\Models\Instructor')->withTimestamps();
	}

	public function wishlists($value='')
	{
		return $this->hasMany('App\Models\Wishlist');
	}
	public function subcategory()
	  {
	      return $this->belongsTo('App\Subcategory');
	  }


}
