<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostShowResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'username' => $this->user->user_name,
            'slug' => $this->slug,
            'url' => $this->url,
            'owner' => auth()->id() == $this->user_id ? true : false,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'votes' => $this->votes,
            'postVotes' => $this->whenLoaded('postVotes')
        ];
    }
}
