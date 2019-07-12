<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	//
	protected $fillable = [
		"name" ,
		"description" ,
	];

	public function posts()
	{
		return $this->belongsToMany(post::class,"categories_posts_rel","cat_id","post_id");
	}
}
