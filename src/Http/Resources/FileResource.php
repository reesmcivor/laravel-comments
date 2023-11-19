<?php

namespace ReesMcIvor\Comments\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'file' => $this->file,
            'original_name' => $this->original_name,
        ];
    }
}