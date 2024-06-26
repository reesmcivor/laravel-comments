<?php

namespace ReesMcIvor\Comments\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'commentable_id' => $this->commentable_id,
            'commentable_type' => $this->commentable_type,
            'model' => [
                'name' => $this->commentable?->name
            ],
            'files' => new FileResourceCollection($this->files),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}