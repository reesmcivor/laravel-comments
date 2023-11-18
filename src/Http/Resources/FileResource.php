<?php

namespace ReesMcIvor\Comments\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => asset($this->path),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}