<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    	return [
    		"esme" => $this->name,
    		"post_electroniki" => $this->email,
    		"gozarVazheh" => $this->password,
    		"inam" => "alaki",
			"relation" => $this->whenLoaded("posts",function (){
				return postResource::collection($this->posts);
			})
		];
//        return parent::toArray($request);
    }

	public function with($request)
	{
		return[
			"relation" => "relation"
		];
	}
}
