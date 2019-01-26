<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
            'userId'=>$this->userId,
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'created_at'=>(string)$this->created_at->format('m/d/Y H:i:s'),
        ];
    }
}
