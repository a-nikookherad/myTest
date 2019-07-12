<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
	public function categories()
	{
		return $this->belongsToMany(category::class,"categories_posts_rel","post_id","cat_id");
	}

/*	public function toArray()
	{
		return[
			"onvan" => $this->title,
			"tozihat" => $this->description,
		];
	}*/
}
