<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
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
            'votes' => $this->votes,
            'postVotes' => $this->whenLoaded('postVotes'),
            'community_slug' => $this->community->slug,
            'comments_count' => $this->comments_count,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
