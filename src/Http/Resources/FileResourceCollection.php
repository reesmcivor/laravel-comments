<?php

namespace ReesMcIvor\Comments\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FileResourceCollection extends ResourceCollection
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'file' => $this->file,
            'url' => asset($this->path),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}