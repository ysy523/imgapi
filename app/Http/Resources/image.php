<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class image extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'url'=>$this->url,
            'page'=>$this->page,
            'requestcount'=>$this->requestCount
        ];
    }
}
