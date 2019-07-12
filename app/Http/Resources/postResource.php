<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class postResource extends JsonResource
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
    		"onvan" => $this->title,
    		"tozihat" => $this->description,
			"relation" => $this->whenLoaded("user",function (){
				return userResource::collection($this->user);
			})
		];
        return parent::toArray($request);
    }
}
