<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
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
            'id'        => $this->id,
            'user_id'   => $this->user_id,
            'user_name' => $this->user->name,
            'title'     => $this->title,
            'body'      => $this->body,
            'link'      => route('articles.show', $this->id),
            'image'     => env('APP_URL'). '/images/' .$this->image,
            'images'    => $this->images,
            'created_at'=> $this->created_at->diffForHumans(),
            'updated_at'=> $this->updated_at->format('d-m-Y'),
        ];
    }
}
