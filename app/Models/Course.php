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
						'certificate',
						'share',
						'price',
						'level_id',
						'subcategory_id',
						'user_id',
						'signature',
						'chairman',
						'approvefeedback'
						];

	// NYL
	public function instructors($value='')
	{

		return $this->belongsToMany('App\Models\Instructor')->withTimestamps();

	}

	public function wishlists($value='')
	{
		return $this->hasMany('App\Models\Wishlist');
	}

	public function sales($value='')
	{
		return $this->belongsToMany('App\Models\Sale')->withPivot('status')->withTimestamps();
	}

	public function reviews($value='')
	{
		return $this->hasMany('App\Models\Review');
	}



	public function subcategory()
	{
	    return $this->belongsTo('App\Models\Subcategory');
	}

	public function user()
	{
	    return $this->belongsTo('App\Models\User');
	}

	public function sections(){
    	return $this->hasMany('App\Models\Section');
    }

    public function installments($value='')
	{
		return $this->belongsToMany('App\Models\Installment')->withTimestamps();
	}

    public function contents()
    {
        return $this->hasManyThrough(Content::class, Section::class);
    }

    public function collections($value='')
    {
    	return $this->belongsToMany('App\Models\Collection')->withPivot('sorting')->withTimestamps();
    }

    public function questions(){
    	return $this->hasMany('App\Models\Question');
    }

    public function tests()
    {
        return $this->hasManyThrough(Test::class, Section::class);
    }
}
