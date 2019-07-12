<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class userResourceCollection extends ResourceCollection
{
//	public $collects = userResource::class;

	/**
	 * Transform the resource collection into an array.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		return parent::toArray($request);
	}

	public function with($request)
	{
		return [
			"inam az relation ha" => 'relation relation relation'
		];
	}
}
