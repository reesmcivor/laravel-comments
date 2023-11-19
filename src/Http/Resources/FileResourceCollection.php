<?php

namespace ReesMcIvor\Comments\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FileResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($file) {
                return new FileResource($file);
            })
        ];
    }
}